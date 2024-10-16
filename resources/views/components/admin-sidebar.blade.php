<section class="admin">

    <sidebar class="admin__sidebar">
        <nav class="admin__nav">
            <ul class="admin__ul">
                <li>
                    <a href="{{ route('admin.home.index') }}"
                        class="{{ Request::is('admin/home') ? 'admin__section--active' : '' }}">Главная</a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}"
                        class="{{ Request::is('admin') ? 'admin__section--active' : '' }}">Категории</a>
                </li>
                <li>
                    <a href="{{ route('admin.contacts.index') }}"
                        class="{{ Request::is('admin/contacts') ? 'admin__section--active' : '' }}">Контакты</a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('login') }}">Выйти</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </sidebar>
    {{ $slot }}
</section>
