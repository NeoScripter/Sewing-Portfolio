@extends('partials.layout')

@section('title', 'Home')

@section('content')

    <section class="portfolio">
        @for ($i = 1; $i <= 3; $i++)
        <div class="portfolio__piece">

            <div class="portfolio__preview">
                <img src="{{ asset('images/Porto 2.png') }}" alt="">
            </div>

            <div class="portfolio__content">

                <h2 class="portfolio__title">Платья</h2>

                <div class="portfolio__description">Подробное описание категории изделий со всеми вытекающими
                    обстоятельствами. Подробное описание категории изделий со всеми вытекающими обстоятельствами. Подробное
                    описание категории изделий со всеми вытекающими обстоятельствами.
                </div>

                <a href="" class="portfolio__link">Смотреть работы</a>
            </div>

        </div>
        @endfor

        <div class="about__action">

            <h3 class="about__prompt">Хотите нанять меня?</h3>

            <a href="" class="about__btn-prompt">Напишите мне</a>
        </div>
    </section>

@endsection
