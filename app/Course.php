<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public function dish()
    {
        return $this->hasMany(Dish::class);
    }
}
