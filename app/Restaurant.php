<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dish()
    {
        return $this->hasMany(Dish::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
