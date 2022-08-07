<?php

	namespace App\Http\Livewire;

	use Livewire\Component;

	class ProductGallery extends Component
	{
		public $product;
		public $selectedImageUrl;

		public function mount ()
		{
			$this->selectedImageUrl = $this->product->getFirstMediaUrl();
		}

		public function render ()
		{
			return view('livewire.product-gallery');
		}

		public function selectImage ( $url ) { $this->selectedImageUrl = $url; }
	}
