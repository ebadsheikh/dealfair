<?php

namespace App\Jobs;

use App\Helpers\GlobalHelper;
use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ResetPasswordLink implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private User $user;
    private $token;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->user->email;
        $template = EmailTemplate::where('key', 'reset_password')->first();
        $toEmail = GlobalHelper::getToEmail($email);

        $reset_password_url = route('auth.reset.password', [$this->token, $email]);

        $template->content = str_replace('[name]', $this->user->name, $template->content);
        $template->content = str_replace('[reset_password_url]', $reset_password_url, $template->content);

        Mail::send([], [], function (Message $message) use ($template, $toEmail) {
            $message->to($toEmail)
                ->subject($template->subject)
                ->from(config('mail.from.address'))
                ->html($template->content);
        });
    }
}
