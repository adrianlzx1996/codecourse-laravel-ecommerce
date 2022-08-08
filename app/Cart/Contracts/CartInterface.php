<?php

	namespace App\Cart\Contracts;

	use App\Models\Variation;

	interface CartInterface
	{

		public function add ( Variation $skuVariant, int $quantity );
	}
