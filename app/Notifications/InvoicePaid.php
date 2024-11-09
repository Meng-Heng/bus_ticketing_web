<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class InvoicePaid extends Notification
{
    /**
     * Create a new notification instance.
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }
 
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('-4546663962')
            // Markdown supported.
            ->content("Hello there!")
            ->line("Your invoice has been *PAID*")
            ->line("Thank you!");
 
            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])
 
            // (Optional) Inline Buttons
            // ->button('View Invoice', $url)
            // ->button('Download Invoice', $url)
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id);
    }
}
