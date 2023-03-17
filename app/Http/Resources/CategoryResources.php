<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResources extends JsonResource
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
                'parent_id'     =>      $this->parent_id,
                'is_active'     =>      $this->is_active,
                'updated_at'    =>      $this->updated_at,
                'created_at'    =>      $this->created_at,
            ],
            'myChildren'    =>    $this->myChildren,
            'myParent'    =>      $this->myParent,
            'plats'       =>        $this->plats  
        ];
    }
}
