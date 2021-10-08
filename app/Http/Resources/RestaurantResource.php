<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'img'=>$this->img,
            'user_id'=>$this->user_id,
            'category'=>$this->category,

        ];
    }
}
