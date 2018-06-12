<?php
namespace App\Mail;
use App\User;
use App\Booking;
use Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class BookingEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // generate link
        // ex: domain.com/verify?token=xxxx
    
        return $this->subject('Booking Anda di Harmon')
            ->with('booking', $this->booking)
            ->view('studio.invoice');
    }
}