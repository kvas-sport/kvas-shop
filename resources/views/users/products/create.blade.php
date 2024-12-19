@extends('layouts.main')
@section('content')
<section class="admin">
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
    <h2>Создать новый продукт</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
        class="registerForm admin-from">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Название:</label>
            <input id="name" type="text" value="{{ old('name') }}" name="name">
        </div>
        <div class="form-group admin-opt">
            <label for="description">Описание:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="amount">Количество:</label>
            <input id="amount" type="number" name="amount" value="{{ old('amount') }}">
        </div>
        <div class="form-group">
            <label for="cost">Цена:</label>
            <input id="cost" type="number" name="cost" value="{{ old('cost') }}">
        </div>
        <div class="form-group">
            <label for="image_url">Картинка:</label>
            <input id="image_url" type="file" name="images[]" multiple>
        </div>

        <div class="form-group admin-select-form-opt">
            <label for="category_id">Категория:</label>
            <select id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="sizes-block" class="form-group" style="display: none;">
            <label>Размеры и количество:</label>
            <div id="sizes-container" class="checkbox-group">
                <label>
                    <input type="checkbox" class="size-checkbox" data-size="S">
                    S
                    <input type="number" name="sizes[S]" placeholder="Кол-во" class="size-quantity" disabled>
                </label>
                <label>
                    <input type="checkbox" class="size-checkbox" data-size="M">
                    M
                    <input type="number" name="sizes[M]" placeholder="Кол-во" class="size-quantity" disabled>
                </label>
                <label>
                    <input type="checkbox" class="size-checkbox" data-size="L">
                    L
                    <input type="number" name="sizes[L]" placeholder="Кол-во" class="size-quantity" disabled>
                </label>
                <label>
                    <input type="checkbox" class="size-checkbox" data-size="XL">
                    XL
                    <input type="number" name="sizes[XL]" placeholder="Кол-во" class="size-quantity" disabled>
                </label>
                <label>
                    <input type="checkbox" class="size-checkbox" data-size="XXL">
                    XXL
                    <input type="number" name="sizes[XXL]" placeholder="Кол-во" class="size-quantity" disabled>
                </label>
            </div>
        </div>

        <!-- Блок для указания собственного размера -->
        <div id="custom-size-block" class="form-group" style="display: none;">
            <label for="one-size">
                <input type="checkbox" id="one-size" class="size-checkbox" data-size="Один размер">
                Один размер
            </label>
            <div id="custom-sizes-container">
                <div class="custom-size-item">
                    <label for="custom-size-0">Укажите размер:</label>
                    <input id="custom-size-0" type="text" placeholder="Введите размер">
                    <label for="custom-size-quantity-0">Количество:</label>
                    <input id="custom-size-quantity-0" type="number" placeholder="Кол-во">
                    <button type="button" class="add-custom-size-to-array">Добавить</button>
                </div>
            </div>
        </div>


        <button type="submit" class="add-to-cart">Добавить</button>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('category_id');
        const sizesBlock = document.getElementById('sizes-block');
        const customSizeBlock = document.getElementById('custom-size-block');
        const sizesContainer = document.getElementById('sizes-container');
        const customSizesContainer = document.getElementById('custom-sizes-container');
        const addCustomSizeButton = document.getElementById('add-custom-size');
        const oneSizeCheckbox = document.getElementById('one-size');
        const sizeCheckboxes = document.querySelectorAll('.size-checkbox');

        // При изменении категории
        categorySelect.addEventListener('change', function () {
            const selectedCategory = categorySelect.options[categorySelect.selectedIndex].text.toLowerCase();

            if (selectedCategory.includes('одежда')) {
                sizesBlock.style.display = 'block';
                customSizeBlock.style.display = 'none';
            } else {
                sizesBlock.style.display = 'none';
                customSizeBlock.style.display = 'block';
            }
        });

        // При выборе фиксированного размера
        oneSizeCheckbox.addEventListener('change', function () {
            if (oneSizeCheckbox.checked) {
                disableAllSizes();
                addToSizesArray('Один размер', 1); // Фиксированный размер
            } else {
                enableAllSizes();
            }
        });

        // Установка размеров
        sizeCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function () {
                const sizeName = checkbox.getAttribute('data-size');
                const quantityInput = checkbox.nextElementSibling;

                if (checkbox.checked) {
                    quantityInput.disabled = false;
                    addToSizesArray(sizeName, quantityInput.value || 1);
                } else {
                    quantityInput.disabled = true;
                    removeFromSizesArray(sizeName);
                }
            });
        });

        // Добавление пользовательского размера
        customSizesContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('add-custom-size-to-array')) {
                const customSizeInput = e.target.previousElementSibling.previousElementSibling;
                const customQuantityInput = e.target.previousElementSibling;
                const sizeName = customSizeInput.value.trim();
                const sizeQuantity = customQuantityInput.value.trim();

                if (sizeName && sizeQuantity) {
                    addToSizesArray(sizeName, sizeQuantity);
                    customSizeInput.value = '';
                    customQuantityInput.value = '';
                }
            }
        });

        // Функция добавления размера в массив
        function addToSizesArray(size, quantity) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sizes[${size}]`;
            input.value = quantity;
            input.dataset.size = size;

            document.forms[0].appendChild(input);
        }

        // Функция удаления размера из массива
        function removeFromSizesArray(size) {
            const input = document.querySelector(`input[name="sizes[${size}]"]`);
            if (input) {
                input.remove();
            }
        }

        // Отключить все размеры
        function disableAllSizes() {
            sizeCheckboxes.forEach((checkbox) => {
                checkbox.checked = false;
                checkbox.nextElementSibling.disabled = true;
            });
        }

        // Включить все размеры
        function enableAllSizes() {
            sizeCheckboxes.forEach((checkbox) => {
                checkbox.checked = false;
                checkbox.nextElementSibling.disabled = false;
            });
        }
    });

</script>
@endsection