<?php

namespace App\Notifications\prestasiprima;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAlert extends Notification
{
    use Queueable;

    protected $title;
    protected $message;
    protected $icon;
    protected $link;

    /**
     * Create a new notification instance.
     */
    public function __construct($title, $message, $icon = 'ri-notification-3-line', $link = '#')
    {
        $this->title = $title;
        $this->message = $message;
        $this->icon = $icon;
        $this->link = $link;
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
            'title' => $this->title,
            'message' => $this->message,
            'icon' => $this->icon,
            'link' => $this->link,
        ];
    }
}
