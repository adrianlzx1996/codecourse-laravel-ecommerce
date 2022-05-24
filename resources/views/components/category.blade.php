<div class="ml-4">
    {{ $category->title }}

    @foreach ($category->children as $child)
        <x-category :category="$child" />
    @endforeach
</div>
