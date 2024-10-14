<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-admin-nav />
    </x-slot>

    <x-admin-sidebar>
        <!-- Admin-specific content -->
        <div class="admin__panel">
            <div>
                <h2 class="admin__title">Редактировать категорию:</h2>
                <form class="admin__category" action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="admin__flex">
                        <button type="submit" class="admin-btn">Сохранить</button>
                        <a href="{{ route('admin.category.index') }}" class="admin-btn">Отмена</a>
                    </div>

                    <h3 class="admin__title">Редактировать категорию</h3>
                    <label for="new_category_name admin__prg">Название категории</label>
                    <input type="text" id="new_category_name" name="new_category_name" value="{{ $category->name }}">
                    <label for="new_category_description admin__prg">Описание категории</label>
                    <textarea name="new_category_description" id="new_category_description" cols="30" rows="5">{{ $category->description }}</textarea>
                </form>
            </div>
        </div>

    </x-admin-sidebar>
</x-layout>
