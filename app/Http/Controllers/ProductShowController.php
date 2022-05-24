<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{
	public function __invoke(Product $product)
	{
		dd($product);
	}
}
