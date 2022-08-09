<div class="border-b py-3 flex items-start last:border-0 last:pb-0">
	<div class="w-20 mr-4">
		<img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}" alt="" class="w-20">
	</div>

	<div class="space-y-2">
		<div>
			<div class="font-semibold text-lg">{{ $variation->formattedPrice() }}</div>
		</div>

		<div class="space-y-1">
			<div>{{ $variation->product->title }}</div>

			<div class="flex items-center text-sm">
				Variation ancestors
			</div>
		</div>
		<div class="flex items-center space-x-4">
			<div class="text-sm flex items-center space-x-2">
				<div class="font-semibold">Quantity</div>
				<select name="" id="" class="text-sm border-none">
					@for($i = 1; $i <= $variation->stockCount(); $i++)
						<option value="{{ $i }}">{{ $i }}</option>
						{{--						{{ $i == $quantity ? 'selected' : '' }}--}}
					@endfor
				</select>
			</div>

			<button class="text-sm text-red-600">
				Remove
			</button>
		</div>
	</div>

</div>
