<?php

namespace App\Mail;

use App\Models\Note;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoteCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Note $note;
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function build()
    {
        return $this->from('griskomihail548@gmail.com', 'Example')
            ->view('emails.text');
    }
}
