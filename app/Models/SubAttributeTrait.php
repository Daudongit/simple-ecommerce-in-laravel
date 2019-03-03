<?php
namespace App\Models;

trait SubAttributeTrait{
	
	private function subAttribute($attribute,$max = 40)
	{
	    if(strlen($this->{$attribute}) >= $max)
	    {
	        return substr($this->{$attribute},0,$max-1)."...";
	    }
	    else
	    {
	        return $this->{$attribute};
	    }
	}
}