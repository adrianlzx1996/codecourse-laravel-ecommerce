<?php

	namespace App\Http\Livewire;

	use App\Cart\Contracts\CartInterface;
	use Livewire\Component;

	class Navigation extends Component
	{
		public function getCartProperty ( CartInterface $cart )
		{
			return $cart;
		}

		public function render ( CartInterface $cart )
		{
			return view('livewire.navigation');
		}
	}
