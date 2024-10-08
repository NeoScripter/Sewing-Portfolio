<header class="header">

    <div class="header__logo">
        <img src="{{ asset('images/logo-dark.png') }}" alt="logo">
    </div>

    <button class="header__burger" aria-expanded="false">
        <svg stroke="var(--button-color)" class="hamburger" viewBox="0 0 100 100" width="250">
            <line class="line top" x1="90" x2="10" y1="30" y2="30" stroke-width="5"
                stroke-linecap="round" stroke-dasharray="80" stroke-dashoffset="0">
            </line>
            <line class="line center" x1="90" x2="10" y1="50" y2="50" stroke-width="5"
                stroke-linecap="round" stroke-dasharray="80" stroke-dashoffset="0">
            </line>
            <line class="line bottom" x1="10" x2="90" y1="70" y2="70" stroke-width="5"
                stroke-linecap="round" stroke-dasharray="80" stroke-dashoffset="0">
            </line>
        </svg>
    </button>

    <nav class="header__nav">
        <ul class="header__ul">
            <li><a href="">Главная</a></li>
            <li><a href="">Портфолио</a></li>
            <li><a href="">Напишите мне</a></li>
            <li class="header__theme-group">
                <div class="header__theme-wrapper">
                    <div class="header__theme-icon">
                        <img src="{{ asset('images/day.svg') }}" alt="light theme">
                    </div>
                    <div class="header__theme-toggle">
                        <input type="checkbox" id="dark-mode" class="header__theme-checkbox">
                        <label for="dark-mode"></label>
                    </div>
                    <div class="header__theme-icon">
                        <img src="{{ asset('images/night.svg') }}" alt="night theme">
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>

<style>
    :root {
        --logo-header: url("{{ asset('images/logo-dark.png') }}");
        --logo-footer: url("{{ asset('images/logo-light.png') }}");
    }

    body.dark-theme {
        --logo-header: url("{{ asset('images/logo-light.png') }}");
        --logo-footer: url("{{ asset('images/logo-dark.png') }}");
    }


    :root:has(#dark-mode:checked) {
        --logo-header: url("{{ asset('images/logo-light.png') }}");
        --logo-footer: url("{{ asset('images/logo-dark.png') }}");
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --logo-header: url("{{ asset('images/logo-light.png') }}");
            --logo-footer: url("{{ asset('images/logo-dark.png') }}");
        }
    }

    @media (prefers-color-scheme: light) {
        :root {
            --logo-header: url("{{ asset('images/logo-dark.png') }}");
            --logo-footer: url("{{ asset('images/logo-light.png') }}");
        }
    }
</style>
