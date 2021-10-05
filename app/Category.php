<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
