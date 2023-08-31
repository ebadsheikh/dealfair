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

class NewCustomerFromAdminJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $template = EmailTemplate::where('key', 'new_customer_from_admin')->first();
        $toEmail = GlobalHelper::getToEmail($this->user->email);
        $login_url = route('auth.signin');

        $template->content = str_replace('[name]', $this->user->full_name, $template->content);
        $template->content = str_replace('[customer_email]', $this->user->email, $template->content);
        $template->content = str_replace('[customer_password]', $this->user->password, $template->content);
        $template->content = str_replace('[login_url]', $login_url, $template->content);

        Mail::send([], [], function (Message $message) use ($template, $toEmail) {
            $message->to($toEmail)
                ->subject($template->subject)
                ->from(config('mail.from.address'))
                ->html($template->content);
        });
    }
}
