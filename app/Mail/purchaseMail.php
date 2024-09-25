<?php

namespace App\Mail;

use App\Models\makanan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class purchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $daftar_makanan;
    public $jumlahPesanan;

    /**
     * Create a new message instance.
     */
    public function __construct($user, makanan $daftar_makanan, $jumlahPesanan)
    {
        $this->user = $user;
        $this->daftar_makanan = $daftar_makanan;
        $this->jumlahPesanan = $jumlahPesanan;

    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Purchase Mail',
        );
    }

    /**
     * Get the message content definition.
     */
  

    public function build(){

        // Log::info('Purchase Mail Data:', [
        //     'user' => $this->user,
        //     'daftar_makanan' => $this->daftar_makanan,
        //     'jumlahPesanan' => $this->jumlahPesanan,
        // ]);

        return $this->view('mail.purchaseMail')
        ->with([
            'user' => $this->user->username,
            'nama_makanan' => $this->daftar_makanan->nama_makanan,
            'jumlahPesanan' => $this->jumlahPesanan,
            'totalHarga' => $this->daftar_makanan->daftar_harga * $this->jumlahPesanan,
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
