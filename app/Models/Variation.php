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

	public function stocks ()
	{
		return $this->hasMany(Stock::class);
	}

	public function stockCount ()
	{
		return $this->descendantsAndSelf->sum(fn($variation) => $variation->stocks->sum('quantity'));
	}

	public function inStock ()
	{
		return $this->stockCount() > 0;
	}

	public function outOfStock ()
	{
		return !$this->inStock();
	}

	public function lowStock ()
	{
		return !$this->outOfStock() && $this->stockCount() <= 5;
	}
}
