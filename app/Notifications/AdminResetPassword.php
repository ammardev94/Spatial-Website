<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPassword extends ResetPassword
{
    use Queueable;

    public function __construct(
        public $token,
        public User $user,
    ) {}

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = route('admin.reset.password', ['token' => $this->token]);

        return (new MailMessage)->subject('Reset Password')
            ->view('mail.auth.reset-password', [
                'url' => $url,
                'user' => $this->user,
            ]);
    }
}
