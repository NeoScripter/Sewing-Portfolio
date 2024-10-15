<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-user-nav />
    </x-slot>

    <section class="hero">

        <div class="hero__image">
            <img src="{{ asset('storage/' . $heroImage->content) }}" alt="hero img">
        </div>

        <div class="hero__content">

            <h1 class="hero__heading">{{ $heroText ? $heroText->content : '' }}</h1>

            <a href="#about" class="hero__btn">
                {!! file_get_contents(public_path('images/btn-arrow.svg')) !!}
                Обо мне
            </a>

        </div>

    </section>

    <section class="about" id="about">

        <div class="about__intro">

            <div class="about__image">
                <img src="{{ asset('storage/' . $homeImage->content) }}" alt="Женщина в бело-синем платье с цветочным узором стоит на фоне зелёных растений и улыбается, поднимая правую руку в жесте приветствия.">
            </div>

            <div class="about__content">
                <h2 class="about__heading">Обо мне</h2>

                <div class="about__description">
                    {{ $homeText ? $homeText->content : '' }}
                </div>

                <a href="{{route('portfolio')}}" class="about__btn">Мои работы</a>

            </div>

        </div>

        <div class="about__action">

            <h3 class="about__prompt">Хотите нанять меня?</h3>

            <a href="{{route('contact')}}" class="about__btn-prompt">Напишите мне</a>
        </div>

    </section>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-layout>
