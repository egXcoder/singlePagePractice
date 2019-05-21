<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Mail\Message;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Notification implements ShouldQueue
{
    use Queueable;
    protected $validated;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        sleep(10);
        return (new Message($this->validated))->to('ai@wjl.sa');
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
            //
        ];
    }
}
