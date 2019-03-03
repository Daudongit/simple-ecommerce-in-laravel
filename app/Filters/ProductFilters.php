<?php

namespace App\Filters;

use App\MOdels\Brand;

class ProductFilters extends Filters
{
	/**
	 * Registered filters to operate upon.
	 *
	 * @var array
	 */
	protected $filters = ['search','price','category','brand'];

	protected function search($searchtext)
	{	
		return $this->builder->where('name','like','%'.$searchtext.'%')
			->orWhere('description','like','%'.$searchtext.'%')
			->orWhere('details','like','%'.$searchtext.'%');
	}

	protected function price($price)
	{
	    return $this->builder->whereBetween('price',explode(',',$price));
	}

	protected function brand($brand)
	{	
		$brand = Brand::where('slug',$brand)->firstOrFail();
		
	    return $this->builder->where('brand_id',$brand->id);
	}

	protected function category($category)
	{
		return $this->builder->whereHas(
			'categories',
			function($query)use($category){
            	return $query->where(
                	'slug',$category
            	);
			}
		);
	}
}