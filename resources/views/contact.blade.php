<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-user-nav />
    </x-slot>

    <div class="contact">

        <div class="contact__preview">
            <h2 class="contact__heading">Напишите мне</h2>

            <div class="contact__intro">{{ $contactsText ? $contactsText->content : '' }}</div>
        </div>

        <div class="contact__form-wrapper">
            <h2 class="contact__heading">Заполните форму</h2>

            <form action="{{ route('contact.send') }}" method="POST" class="contact__form">
                @csrf
                <div class="contact__input-group">
                    <label for="clientname">Имя</label>
                    <input type="text" id="clientname" name="clientname" placeholder="Иванов Иван"
                        value="{{ old('clientname') }}">
                    @error('clientname')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="contact__input-group">
                    <label for="clientemail">Почта</label>
                    <input type="email" id="clientemail" name="clientemail" placeholder="example@gmail.com"
                        value="{{ old('clientemail') }}">
                    @error('clientemail')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="contact__input-group">
                    <label for="clientmessage">Сообщение</label>
                    <textarea name="clientmessage" id="clientmessage" cols="30" rows="5" placeholder="Чем я могу вам помочь?">{{ old('clientmessage') }}</textarea>
                    @error('clientmessage')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <button class="contact__btn" type="submit">Отправить</button>
            </form>

        </div>

    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-layout>
