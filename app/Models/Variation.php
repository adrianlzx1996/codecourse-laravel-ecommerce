<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Variation extends Model
{
	use HasFactory;
	use HasRecursiveRelationships;


	public function formattedPrice()
	{
		return money($this->price);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
