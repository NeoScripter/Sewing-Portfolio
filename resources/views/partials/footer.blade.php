<footer class="footer">

    <div class="footer__logo">
        <img src="{{ asset('images/logo-dark.png') }}" alt="logo">
    </div>

    <nav class="footer__nav">
        <ul class="footer__ul">
            <li><a href="{{route('home')}}">Главная</a></li>
            <li><a href="{{route('gallery')}}">Портфолио</a></li>
            <li><a href="{{route('contact')}}">Напишите мне</a></li>
        </ul>
    </nav>

    <ul class="footer__socials">
        <a href="" class="footer__social">
            {!! file_get_contents(public_path('images/whatsapp.svg')) !!}
        </a>
        <a href="" class="footer__social">
            {!! file_get_contents(public_path('images/telegram.svg')) !!}
        </a>
        <a href="" class="footer__social footer__social--viber">
            {!! file_get_contents(public_path('images/viber.svg')) !!}
        </a>
    </ul>
</footer>
