<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MyThirdNotifications extends Notification
{
    use Queueable;

    public $transfer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transfer)
    {
        $this->transfer = $transfer;
    }   

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'transfer_id' => $this->transfer->transfer_id,
            'from_department' => $this->transfer->transfer_departments->department_name,
            'to_department' => $this->transfer->transfer_department->department_name,
            'patient_id' => $this->transfer->patient_id,
            'remarks' => $this->transfer->remarks,
        ];
    }
}
