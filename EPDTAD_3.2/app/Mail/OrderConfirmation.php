<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductoPedido;



class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function build()
    {

        $productos=ProductoPedido::where('id_pedido', Auth::user()->pedidos->last()->id)->get();
        return $this->view('emails.orders.confirmation',compact('productos'))
                    ->subject('Gracias por la compra');
    }

}
