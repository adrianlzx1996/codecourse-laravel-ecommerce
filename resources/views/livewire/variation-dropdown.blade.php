<div class="mt-3">
    <div class="font-semibold mb-1">
        {{ Str::title($variations->first()?->type) }}
    </div>

    <x-select class="w-full" wire:model="selectedVariation">
        <option value="">Choose an option</option>

        @foreach ($variations as $variation)
            <option value="{{ $variation->id }}" {{ $variation->outOfStock() ? "disabled" : "" }}>
	            {{ $variation->title }} {{ $variation->lowStock() ? '(Low Stock)' : '' }} {{ $variation->outOfStock() ? '(Out of Stock)' : '' }}
            </option>
        @endforeach
    </x-select>

    @if ($this->selectedVariationModel?->children->count())
        <livewire:variation-dropdown :variations="$this->selectedVariationModel->children->sortBy('order')" :key="$selectedVariation" />
    @endif
</div>
