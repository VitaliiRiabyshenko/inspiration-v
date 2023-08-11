<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application_data;

    /**
     * Create a new notification instance.
     * 
     */
    public function __construct($application_data)
    {
        $this->application_data = $application_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->markdown('mail.user-application', ['application_data' => $this->application_data]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'application_id' => $this->application_data['id'],
            'full_name' =>  $this->application_data['full_name'],
            'email' => $this->application_data['email']
        ];
    }
}
