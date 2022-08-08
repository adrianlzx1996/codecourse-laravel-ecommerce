<?php

	namespace App\Cart;

	use App\Cart\Contracts\CartInterface;
	use App\Models\Cart as ModelsCart;
	use App\Models\User;
	use App\Models\Variation;
	use Illuminate\Session\SessionManager;

	class Cart implements CartInterface
	{
		protected $instance;

		public function __construct ( protected SessionManager $session ) {}

		public function exists ()
		{
			return $this->session->has(config('cart.session.key'));
		}

		public function create ( ?User $user = null )
		: void {
			$instance = ModelsCart::make();

			if ( $user ) {
				$instance->user()->associate($user);
			}

			$instance->save();

			$this->session->put(config('cart.session.key'), $instance->uuid);
		}

		public function add ( Variation $skuVariant, int $quantity = 1 )
		{
			if ( $existingVariation = $this->getVariation($skuVariant) ) {
				$quantity += $existingVariation->pivot->quantity;
			}

			$this->instance()->variations()->syncWithoutDetaching([
																	  $skuVariant->id => [
																		  'quantity' => min($quantity, $skuVariant->stockCount()),
																	  ],
																  ]);
		}

		public function getVariation ( Variation $variation )
		{
			return $this->instance()->variations()->find($variation->id);
		}

		protected function instance ()
		{
			if ( $this->instance ) {
				return $this->instance;
			}

			return $this->instance = ModelsCart::whereUuid($this->session->get(config('cart.session.key')))->first();
		}

		public function contentsCount ()
		{
			return $this->contents()->count();
		}

		public function contents ()
		{
			return $this->instance()->variations;
		}
	}
