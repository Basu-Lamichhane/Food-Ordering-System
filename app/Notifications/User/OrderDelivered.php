<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderDelivered extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderid,$on)
    {
        $this->orderid= $orderid;
        $this->on= $on;
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
        return (new MailMessage)
                    ->from('foodorder@pawanregmi.com.np', 'Food Ordering System')
                    ->subject("Order #$this->orderid Deliverd Successfull!!")
                    ->line("Dear Customer,")
                    ->line("Your Order of id #$this->orderid has been delivered on $this->on successfully.")
                    ->action('View Order', url('/orders/'.$this->orderid))
                    ->line('Thank you for using our service!')
                    ->line('If you didnt receive your order then contact us at x@xx.com !');
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
