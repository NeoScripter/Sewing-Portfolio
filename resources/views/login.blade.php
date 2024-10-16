<x-layout>
    <x-slot name="nav">
        <x-admin-nav />
    </x-slot>
        <div class="admin__panel">

            <div class="login__container">
                <h2 class="admin__title">Вход</h2>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Email Input -->
                    <div class="login__form-group">
                        <label for="name">Имя пользователя</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <!-- Password Input -->
                    <div class="login__form-group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <!-- Error Message -->
                    @if ($errors->any())
                        <div class="admin__error">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button class="login__btn" type="submit">Войти</button>
                </form>
            </div>

        </div>
</x-layout>
