<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "author" => User::findOrFail($this->user_id)->login,
            "author_avatar" => User::findOrFail($this->user_id)->image,
            "title" => $this->title,
            "body" => $this->body,
            "category" => Category::findOrFail($this->categories_id)->name,
            "photo" => $this->photo,
            "status" => $this->status,
            "updated_at" => $this->updated_at->format("d.m.Y")
        ];
    }
}
