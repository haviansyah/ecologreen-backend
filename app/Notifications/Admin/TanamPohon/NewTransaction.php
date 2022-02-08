<?php

namespace App\Notifications\Admin\TanamPohon;

use App\Models\PlantTreeTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use williamcruzme\FCM\Messages\FcmMessage;

class NewTransaction extends Notification
{
    use Queueable;

    private PlantTreeTransaction $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PlantTreeTransaction $transaction)
    {
        $this->transaction = $transaction;
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
            'transaction_id' => $this->transaction->id,
            'amount' => $this->transaction->total_price,
            'url' => route('transaction.show',['transaction'=>$this->transaction->id]),
            'messages' => $this->generateMessage()
        ];
    }

    public function generateMessage(){
        return 'Terdapat order tanam pohon baru, check sekarang!';
    }
}
