<?php

	namespace App\Http\Livewire;

	use App\Cart\Contracts\CartInterface;
	use Livewire\Component;

	class Cart extends Component
	{
		public function render ( CartInterface $cart )
		{
			return view('livewire.cart', [
				'cart' => $cart,
			]);
		}
	}
