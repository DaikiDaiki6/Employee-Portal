<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IpcrNotification extends Notification
{
    use Queueable;
    public $user;
    public $status;
    public $file_id;

    public $department_leader;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $status, $file_id, $department_leader)
    {
        $this->user = $user;
        $this->status = $status;
        $this->file_id = $file_id;
        $this->department_leader = $department_leader;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'employee_id' => $this->user,
            'status' => $this->status,
            'file_id' => $this->file_id,
            'department_leader' => $this->department_leader,
        ];
    }
}
