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
use Illuminate\Http\Request;
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
            return response()->json(['note' => $note]);
        }

        return response()->json(['message' => 'note not found']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
