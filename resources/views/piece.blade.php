<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-user-nav />
    </x-slot>

    <section class="piece">

        <div class="piece__preview">
            <h1 class="piece__title">{{ $category->name }}</h1>

            <div class="piece__description">{{ $category->description }}
            </div>
        </div>

        <div class="piece__grid">
            @foreach ($category->images as $image)
            <div class="piece__item">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="lorem">
            </div>
            @endforeach
        </div>

    </section>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-layout>
