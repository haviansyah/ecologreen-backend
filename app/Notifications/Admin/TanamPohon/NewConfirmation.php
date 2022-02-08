<?php

namespace App\Notifications\Admin\TanamPohon;

use App\Models\PlantTreeTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use williamcruzme\FCM\Messages\FcmMessage;

class NewConfirmation extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['fcm','database'];
    }

    /**
     * Get the Firebase Message representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Williamcruzme\Fcm\Messages\FcmMessage
     */
    public function toFcm($notifiable)
    {
        return (new FcmMessage)
            ->notification([
                'title' => 'EcoLoGreen',
                'body' => $this->generateMessage(),
            ]);
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
            'url' => route('payment-confirmation.index'),
            'messages' => $this->generateMessage()
        ];
    }

    public function generateMessage(){
        return 'Terdapat konfirmasi pembayaran baru check sekarang!';
    }
}
