<?php

namespace App\Http\Requests\Api\Users;

use App\DTOs\Users\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['email', 'string', 'required'],
            'password' => ['string', 'required', 'min:8', 'max:255'],
        ];
    }

    public function getData(): UserDTO
    {
        return new UserDTO(
            $this->validated()['email'],
            $this->validated()['password'],
        );
    }
}
