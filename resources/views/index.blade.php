@extends('partials.layout')

@section('title', 'Home')

@section('content')

    <section class="hero">

        <div class="hero__image">
            <img src="{{ asset('images/hero.webp') }}" alt="hero img">
        </div>

        <div class="hero__content">

            <h1 class="hero__heading">Здравствуйте, меня зовут Оксана и я - профессиональная швея</h1>

            <a href="#about" class="hero__btn">
                {!! file_get_contents(public_path('images/btn-arrow.svg')) !!}
                Обо мне
            </a>

        </div>

    </section>

    <section class="about" id="about">

        <div class="about__intro">

            <div class="about__image">
                <img src="{{asset('images/intro.webp')}}" alt="Женщина в бело-синем платье с цветочным узором стоит на фоне зелёных растений и улыбается, поднимая правую руку в жесте приветствия.">
            </div>

            <div class="about__content">
                <h2 class="about__heading">Обо мне</h2>

                <div class="about__description">
                    Я профессиональная швея и ищу работу в интересной компании. Моя главная цель — шить качественную и
                    удобную одежду. Я хорошо разбираюсь в современных техниках шитья и уделяю особое внимание деталям и
                    аккуратности в работе. В основном я шью на швейной машине, но могу адаптироваться под любые задачи и
                    инструменты. Живу в Москве, но готова работать удаленно и уже имею опыт дистанционного сотрудничества. В
                    свободное время я предпочитаю активный отдых на природе: прогулки, бег или велосипедные поездки. Буду
                    рада, если вы посмотрите мои работы!
                </div>

                <a href="{{route('gallery')}}" class="about__btn">Мои работы</a>

            </div>

        </div>

        <div class="about__action">

            <h3 class="about__prompt">Хотите нанять меня?</h3>

            <a href="" class="about__btn-prompt">Напишите мне</a>
        </div>

    </section>

@endsection
