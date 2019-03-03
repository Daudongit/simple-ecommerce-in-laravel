<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{   
    use SlugAttributeTrait;
    
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
