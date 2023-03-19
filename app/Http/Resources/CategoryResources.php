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
        $category = [
            'id'                =>      $this->id,
            'attributes'        =>      [
                'name'          =>      $this->name,
                'level'         =>      $this->level,
                'image'         =>      $this->image,
                'parent_id'     =>      $this->parent_id,
                'is_active'     =>      $this->is_active,
                'updated_at'    =>      $this->updated_at,
                'created_at'    =>      $this->created_at,
            ]
        ];

        if($request->with_details && $request->with_details == "true"){
            $category['myParent'] = $this->myParent;
            $category['myChildren'] = $this->myChildren;
            $category['plats'] = $this->plats;
        }

        return $category;

    }
}
