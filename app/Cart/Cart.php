<?php

	namespace App\Cart;

	use App\Cart\Contracts\CartInterface;
	use App\Models\Cart as ModelsCart;
	use App\Models\User;
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

		public function contentsCount ()
		{
			return $this->contents()->count();
		}

		public function contents ()
		{
			return $this->instance()->variations;
		}

		protected function instance ()
		{
			if ( $this->instance ) {
				return $this->instance;
			}
			
			return $this->instance = ModelsCart::whereUuid($this->session->get(config('cart.session.key')))->first();
		}
	}
