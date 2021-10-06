<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'customer_name'=>$this->customer_name,
            'customer_surname'=>$this->customer_surname,
            'customer_address'=>$this->customer_address,
            'customer_email'=>$this->customer_email,
            'customer_phone'=>$this->customer_phone,
            'total_price'=>$this->total_price,
            'status'=>$this->status,
            'discount'=>$this->discount,
            'notes'=>$this->notes,
            'restaurant'=>$this->dish[0]->restaurant,
            'dishes' =>$this->dish,
            
            

        ];
    }
}
