<?php

namespace App\Jobs;

use App\Helpers\GlobalHelper;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class UserVerificationRejectedReasonJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private User $user;
    private string $subject;
    private string $content;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, $subject, $content)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $toEmail = GlobalHelper::getToEmail($this->user->email);
        $subject = $this->subject;

        $this->content = str_replace('[name]', $this->user->full_name, $this->content);

        Mail::send([], [], function (Message $message) use ($subject, $toEmail) {
            $message->to($toEmail)
                ->subject($subject)
                ->from(config('mail.from.address'))
                ->html($this->content);
        });
    }
}
