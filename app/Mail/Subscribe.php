<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    protected $judul_swara_nusvantaras;
    protected $slug_kategori_swara_nusvantaras;
    protected $slug_swara_nusvantaras;
    public function __construct($judul_swara_nusvantaras, $slug_kategori_swara_nusvantaras, $slug_swara_nusvantaras)
    {
        $this->judul_swara_nusvantaras = $judul_swara_nusvantaras;
        $this->slug_kategori_swara_nusvantaras = $slug_kategori_swara_nusvantaras;
        $this->slug_swara_nusvantaras = $slug_swara_nusvantaras;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Subscribe',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emailsubscribe',
        );
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

    public function build()
    {
       return $this->from(ENV('MAIL_FROM_ADDRESS'))
                   ->view('emailsubscribe')
                   ->with(
                    [
                        'nama' => ENV('APP_NAME'),
                        'website' => ENV('APP_URL'),
                        'judul' => $this->judul_swara_nusvantaras,
                        'slug_kategori' => $this->slug_kategori_swara_nusvantaras,
                        'slug_judul' => $this->slug_swara_nusvantaras,
                    ]);
    }
}
