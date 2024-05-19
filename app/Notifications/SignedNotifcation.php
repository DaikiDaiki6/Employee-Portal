<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignedNotifcation extends Notification
{
    use Queueable;

    public $user;
    public $type;
    public $status;
    public $file_id;
    public $signed_in_editor;

    public $verdict;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $type, $status, $file_id, $signed_in_editor=null, $verdict)
    {
        $this->user = $user;
        $this->type = $type;
        $this->status = $status;
        $this->file_id = $file_id;
        $this->verdict  = $verdict;
        if($signed_in_editor != null){
            $this->signed_in_editor = $signed_in_editor;
        }
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'employee_id' => $this->user,
            'type' => $this->type,
            'status' => $this->status,
            'file_id' => $this->file_id,
            'verdict' => $this->verdict,
            'signed_in_editor' => $this->signed_in_editor ?? ' '
            
        ];
    }
}
