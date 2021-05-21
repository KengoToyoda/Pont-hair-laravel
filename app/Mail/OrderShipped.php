<?php

namespace App\Mail;

use App\User;
use App\Menu;
use App\Reserve;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $reserve;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Reserve $reserve)
    {
        
        return $this->view('reserve.mail')
                    ->subject('予約確認メール')
                    ->with([
                        'reserve' => $this->reserve
                        ]);
    }
}
