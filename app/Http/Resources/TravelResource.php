<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Travel
 * @property int $number_of_nigths
 */

class TravelResource extends JsonResource
{


    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'number_of_days' => $this->number_of_days,
            'number_of_nigths' => $this->number_of_nigths,
        ];
    }
}