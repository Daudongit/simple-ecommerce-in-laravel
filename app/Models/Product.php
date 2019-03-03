<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use SlugAttributeTrait;

    protected $fillable = ['quantity'];
    
    protected $casts = ['images'=>'array'];


    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query,$filter)
    {
        return $filter->apply($query);
    }
    
    public function scopeRecommended($query)
    {
    	return $query->orderBy('view_count');
    }

    public function scopeSimilar($query)
    {
    	return $query->where('id','!=',$this->id)->whereHas('categories',function($query){
            return $query->whereIn(
                'slug',$this->categorySlugs()
            );
        });
    }

    public function categorySlugs()
    {   
        return $this->categories()->pluck('slug')->toArray();
    }

    public function presentPrice()
    {   
        return '₦'.$this->price;
        //return money_format('$%i', $this->price / 100);
    }

}
