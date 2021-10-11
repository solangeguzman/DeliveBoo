<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function dish()
    {
        return $this->belongsToMany(Dish::class);
    }

    protected $fillable = [
        'status'
    ];
}
