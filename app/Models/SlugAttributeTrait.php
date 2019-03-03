<?php
namespace App\Models;

trait SlugAttributeTrait{
	
	public function setSlugAttribute($value)
    {   
        $slug = str_slug($value);

        if (static::whereSlug($slug)->exists()){
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }
}