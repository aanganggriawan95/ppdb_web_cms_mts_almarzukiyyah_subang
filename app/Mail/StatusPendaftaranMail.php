<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class StatusPendaftaranMail extends Mailable
{
    use Queueable, SerializesModels;

    public $siswa;

    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hasil Pendaftaran PPDB',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.status', // ✅ FIX DI SINI
        );
    }
}