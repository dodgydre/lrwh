<?php

namespace App\Mail;

use App\Wishlist;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WishlistEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $wishlist;

    /**
     * Create a new message instance.
     */
    public function __construct(Wishlist $wishlist)
    {
        $this->wishlist = $wishlist;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@lrwh.andreasgeorghiou.com')
          ->view('emails.wishlist');
    }
}
