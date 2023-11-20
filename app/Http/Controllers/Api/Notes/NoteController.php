<?php

namespace App\Http\Controllers\Api\Notes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Notes\NoteUpsertRequest;
use App\Http\Resources\NoteResource;
use App\Jobs\SendEmail;
use App\Models\Note;
use App\Services\Notes\NoteService;
use App\Services\Users\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct(
        protected NoteService $noteService,
        protected UserService $userService
    )
    {
    }

    public function index(): JsonResponse
    {
        $notes = $this->noteService->index();

        return response()->json([
            'notes' => NoteResource::collection($notes)
        ]);
    }

    public function store(NoteUpsertRequest $request): JsonResponse
    {
        $note = $this->noteService->store($request);

        $admin = $this->userService->getAdmin();

        SendEmail::dispatch($note, $admin);

        return response()->json(['note' => NoteResource::make($note)]);
    }

    public function show(Note $note): JsonResponse
    {
        if (Auth::user()->id === $note->user_id || Auth::user()->is_admin) {
            return response()->json(['note' => NoteResource::make($note)]);
        }

        return response()->json(['message' => 'Note not found']);
    }

    public function update(NoteUpsertRequest $request, Note $note)
    {
        $data = $request->getData()->toArray();

        if (Auth::user()->id === $note->user_id) {
            return $this->noteService->update($data, $note)
                ? response()->json(['message' => 'Note successfully updated'])
                : response()->json(['message' => 'Error updating a note']);
        }

        return response()->json(['message' => 'Note not found']);
    }

    public function destroy(Note $note)
    {
        if (Auth::user()->id === $note->user_id) {
            return $this->noteService->destroy($note)
                ? response()->json(['message' => 'Note successfully deleted'])
                : response()->json(['message' => 'Error deleting a note']);
        }

        return response()->json(['message' => 'Note not found']);
    }
}
