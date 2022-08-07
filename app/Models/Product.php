<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Spatie\Image\Manipulations;
	use Spatie\MediaLibrary\HasMedia;
	use Spatie\MediaLibrary\InteractsWithMedia;
	use Spatie\MediaLibrary\MediaCollections\Models\Media;

	class Product extends Model implements HasMedia
	{
		use HasFactory, InteractsWithMedia;

		public function formattedPrice ()
		{
			return money($this->price);
		}

		public function variations ()
		{
			return $this->hasMany(Variation::class);
		}

		public function registerMediaConversions ( Media $media = null )
		: void {
			$this
				->addMediaConversion('thumb200x200')
				->fit(Manipulations::FIT_CROP, 200, 200)
				->nonQueued()
			;
		}

		public function registerMediaCollections ()
		: void
		{
			$this->addMediaCollection('default')
				 ->useFallbackUrl('/storage/no-product-image.png')
			;
		}
	}
