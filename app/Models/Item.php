<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function cats()
    {   
        return $this->morphToMany('App\Models\Category', 'categorables');
    }
}
