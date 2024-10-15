<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-admin-nav />
    </x-slot>
    <x-admin-sidebar>
        <!-- Admin-specific content -->
        <div class="admin__panel">

            <div class="admin__image-group">
                <h3 class="admin__title">Фото на главной странице</h3>

                @if ($heroImage)
                    <div class="admin__image-item">
                        <img src="{{ asset('storage/' . $heroImage->content) }}" alt="image" class="admin__image">
                    </div>
                @else
                    <p>В секции нет фотографии.</p>
                @endif

                <form action="{{ route('admin.content.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="content_id" value="{{ $heroImage ? $heroImage->id : '' }}">

                    <input type="hidden" name="section_name" value="hero">

                    <input type="hidden" name="page_name" value="home">

                    <input type="file" name="image" accept="image/*">
                    <button type="submit" class="admin-btn">Добавить/Обновить фотографию</button>
                    @error('image')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </form>
            </div>

            <form class="admin__add-category-form" action="{{ route('admin.content.storeOrUpdate') }}" method="POST">
                @csrf

                <h3 class="admin__title">Текст на главной</h3>

                <input type="hidden" name="content_id" value="{{ $heroText ? $heroText->id : '' }}">

                <input type="hidden" name="section_name" value="hero_text">

                <input type="hidden" name="page_name" value="home">

                <textarea name="section_content" cols="30" rows="5">{{ $heroText ? $heroText->content : 'Введите текст для главной страницы' }}</textarea>

                @error('section_content')
                    <p class="admin__error">{{ $message }}</p>
                @enderror

                <button type="submit" class="admin-btn">Сохранить/Обновить</button>
            </form>

            <div class="admin__image-group">
                <h3 class="admin__title">Фото внизу главной страницы</h3>

                @if ($homeImage)
                    <div class="admin__image-item">
                        <img src="{{ asset('storage/' . $homeImage->content) }}" alt="image" class="admin__image">
                    </div>
                @else
                    <p>В секции нет фотографии.</p>
                @endif

                <form action="{{ route('admin.content.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="content_id" value="{{ $homeImage ? $homeImage->id : '' }}">

                    <input type="hidden" name="section_name" value="home">

                    <input type="hidden" name="page_name" value="home">

                    <input type="file" name="image" accept="image/*">
                    <button type="submit" class="admin-btn">Добавить/Обновить фотографию</button>
                    @error('image')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </form>
            </div>

            <form class="admin__add-category-form" action="{{ route('admin.content.storeOrUpdate') }}" method="POST">
                @csrf

                <h3 class="admin__title">Текст внизу главной страницы</h3>

                <input type="hidden" name="content_id" value="{{ $homeText ? $homeText->id : '' }}">

                <input type="hidden" name="section_name" value="home_text">

                <input type="hidden" name="page_name" value="home">

                <textarea name="section_content" cols="30" rows="10">{{ $homeText ? $homeText->content : 'Введите текст для главной страницы' }}</textarea>

                @error('section_content')
                    <p class="admin__error">{{ $message }}</p>
                @enderror

                <button type="submit" class="admin-btn">Сохранить/Обновить</button>
            </form>

        </div>
    </x-admin-sidebar>
</x-layout>
