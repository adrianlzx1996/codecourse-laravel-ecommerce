<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-4 p-6 overflow-hidden md:grid-cols-2 lg:grid-cols-4">
                @foreach ($categories as $category)
                    <x-category :category="$category" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
