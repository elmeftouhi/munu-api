<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatRessources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                =>      $this->id,
            'attributes'        =>      [
                'name'          =>      $this->name,
                'level'         =>      $this->level,
                'image'         =>      $this->image,
                'title'     =>      $this->title,
                'description'     =>      $this->description,
                'price'     =>      $this->price,
                'is_active'     =>      $this->is_active,
                'updated_at'    =>      $this->updated_at,
                'created_at'    =>      $this->created_at,
            ],
            'category'    =>    $this->category
        ];
    }
}
