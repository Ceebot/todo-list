<?php

namespace App\Services\Notes;

use App\Http\Requests\Api\Notes\NoteUpsertRequest;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class NoteService
{
    public function index(): Collection
    {
        $user = Auth::user();

        if ($user->is_admin) {
            return Note::all();
        }

        return $user->notes;
    }

    public function store(NoteUpsertRequest $request): Note
    {
        return Note::create([
            'user_id' => Auth::user()->id,
            'title' => $request->getData()->getTitle(),
            'content' => $request->getData()->getContent(),
        ]);
    }
}
