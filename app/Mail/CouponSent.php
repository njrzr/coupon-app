<?php

namespace App\Mail;

use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class CouponSent extends Mailable
{
  use Queueable, SerializesModels;

  public $store;
  public $user;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user, $store)
  {
    $this->user = $user;
    $this->store = $store;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('/email/coupon')->with(['user' => $this->user, 'store' => $this->store]);
  }
}
