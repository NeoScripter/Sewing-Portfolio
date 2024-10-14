<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-user-nav />
    </x-slot>

    <section class="portfolio">
        @foreach ($categories as $category)
        <div class="portfolio__piece">

            <div class="portfolio__preview">
                <img src="{{ asset('storage/' . $category->images()->first()->image_path) }}" alt="lorem">
            </div>

            <div class="portfolio__content">

                <h2 class="portfolio__title">{{ $category->name }}</h2>

                <div class="portfolio__description">{{ $category->description }}
                </div>

                <a href="{{route('portfolio.piece', $category->id)}}" class="portfolio__link">Смотреть работы</a>
            </div>

        </div>
        @endforeach

        <div class="about__action">

            <h3 class="about__prompt">Хотите нанять меня?</h3>

            <a href="" class="about__btn-prompt">Напишите мне</a>
        </div>
    </section>

</x-layout>
