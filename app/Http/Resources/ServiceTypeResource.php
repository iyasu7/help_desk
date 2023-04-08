<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'service_category_id'=> $this->service_category_id,
            'name'=>  $this->name,
            'description'=>  $this->description,
            'serviceCategory'=>  $this->serviceCategory,
        ];
    }
}
