<?php

namespace App\DTOs\Users;

use Illuminate\Contracts\Support\Arrayable;

class NoteDTO implements Arrayable
{
    public function __construct(
        protected string $title,
        protected string $content,
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
