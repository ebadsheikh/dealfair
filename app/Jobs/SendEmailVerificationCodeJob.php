<?php

namespace App\Jobs;

use App\Helpers\GlobalHelper;
use App\Models\EmailTemplate;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationCodeJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private User $user;
    private EmailVerification $emailVerification;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, EmailVerification $emailVerification)
    {
        $this->user = $user;
        $this->emailVerification = $emailVerification;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $template = EmailTemplate::where('key', 'email_verification_code')->first();
        $toEmail = GlobalHelper::getToEmail($this->user->email);

        $template->content = str_replace('[name]', $this->user->first_name . ' '. $this->user->last_name, $template->content);
        $template->content = str_replace('[verification_code]', $this->emailVerification->code, $template->content);

        Mail::send([], [], function (Message $message) use ($template, $toEmail) {
            $message->to($toEmail)
                ->subject($template->subject)
                ->from(config('mail.from.address'))
                ->html($template->content);
        });
    }
}
