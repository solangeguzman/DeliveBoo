<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dish extends Model
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
