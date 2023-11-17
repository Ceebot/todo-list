<?php

namespace App\Http\Requests\Api\Notes;

use App\DTOs\Users\NoteDTO;
use Illuminate\Foundation\Http\FormRequest;

class NoteUpsertRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['string', 'required', 'min:1', 'max:50'],
            'content' => ['string'],
        ];
    }

    public function getData(): NoteDTO
    {
        return new NoteDTO(
            $this->validated()['title'],
            $this->validated()['content'],
        );
    }
}
