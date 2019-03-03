<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    use SubAttributeTrait, SlugAttributeTrait;
    
    protected $table = 'category';
    
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function  getSubNameAttribute()
    {   
        return $this->subAttribute('name',17);
    }
}
