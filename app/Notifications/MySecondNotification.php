<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MySecondNotification extends Notification
{ 
    use Queueable;

    public $patients;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($patients)
    {
        $this->patients = $patients;
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
    public function toDatabase($notifiable)
    {
        return [
            'patient_id' => $this->patients->id,
            'fname' => $this->patients->fname,
            'lname' => $this->patients->lname,
            'mname' => $this->patients->mname,
            'department' => $this->patients->departments->department_name,
        ];
    }
}
