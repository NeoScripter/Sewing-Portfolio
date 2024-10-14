<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-admin-nav />
    </x-slot>

    <x-admin-sidebar>
        <!-- Admin-specific content -->
        <div class="admin__panel">
            <div>
                <h2 class="admin__title">Текущие категории:</h2>
                @foreach ($categories as $category)
                    <div class="admin__category">
                        <div class="admin__flex">
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn">Удалить категорию</button>
                            </form>
                            <a href="{{ route('admin.category.show', $category->id) }}" class="admin-btn">Редактировать
                                категорию</a>
                        </div>
                        <h2 class="admin__title">{{ $category->name }}</h2>
                        <p>{{ $category->description }}</p>
                        <div class="admin__images">
                            @if ($category->images->isEmpty())
                                <p>В категории нет фотографий</p>
                            @else
                                @foreach ($category->images as $image)
                                    <div class="admin__image-item">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="image"
                                            class="admin__image">
                                        <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST"
                                            class="admin__image-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">&times;</button>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="file" name="images[]" multiple>
                            <button type="submit" class="admin-btn">Добавить фотографии</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <form class="admin__add-category-form" action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <h3 class="admin__title">Добавить новую категорию</h3>
                <label for="new_category_name admin__prg">Название категории</label>
                <input type="text" id="new_category_name" name="new_category_name">
                <label for="new_category_description admin__prg">Описание категории</label>
                <textarea name="new_category_description" id="new_category_description" cols="30" rows="5"></textarea>
                <button type="submit" class="admin-btn">Добавить категорию</button>
            </form>
        </div>

    </x-admin-sidebar>
</x-layout>
