<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        dd($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'img'=>$this->img,
            'user_id'=>$this->user_id,
            'category'=>$this->category[0]['name'],
            
        ];
    }
}
