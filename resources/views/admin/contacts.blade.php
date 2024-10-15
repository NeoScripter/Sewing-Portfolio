<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-admin-nav />
    </x-slot>

    <x-admin-sidebar>
        <!-- Admin-specific content -->
        <div class="admin__panel">
            <form class="admin__add-category-form" action="{{ route('admin.content.storeOrUpdate') }}" method="POST">
                @csrf

                <h3 class="admin__title">Текст на странице контакты</h3>

                <input type="hidden" name="content_id" value="{{ $contactsText ? $contactsText->id : '' }}">

                <input type="hidden" name="section_name" value="contact_text">

                <input type="hidden" name="page_name" value="contacts">

                <textarea name="section_content" cols="30" rows="10">{{ $contactsText ? $contactsText->content : 'Введите текст для страницы контактов' }}</textarea>

                @error('section_content')
                    <p class="admin__error">{{ $message }}</p>
                @enderror

                <button type="submit" class="admin-btn">Сохранить/Обновить</button>
            </form>
        </div>
    </x-admin-sidebar>
</x-layout>
