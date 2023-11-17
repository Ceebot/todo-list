<?php

namespace App\Jobs;

use App\Mail\NoteCreated;
use App\Models\Note;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Note $note;
    protected User $admin;
    public function __construct(Note $note, User $admin)
    {
        $this->note = $note;
        $this->admin = $admin;
    }

    public function handle(): void
    {
        Mail::to($this->admin->email)
            ->send(new NoteCreated($this->note));
    }
}
