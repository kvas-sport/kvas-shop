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

        <!-- Чекбокс "Один размер" -->
        <div id="one-size-block" class="form-group" style="display: none;">
            <label for="one-size">
                <input type="checkbox" id="one-size">
                Один размер
            </label>
            <input id="one-size-amount" type="number" name="sizes[one_size]" value="{{ old('amount') }}"
                placeholder="Укажите количество" disabled>
        </div>
        <!-- Чекбокс  "Свои размеры" -->
        <div class="form-group">
            <label for="custom_size_checkbox">
                <input type="checkbox" id="custom_size_checkbox">
                Свои размеры
            </label>
        </div>

        <div id="custom_sizes_block" class="form-group" style="display: none;">
            <div id="custom-sizes-container">
                <!-- Кастомные размеры добавятся здесь -->
            </div>
            <button type="button" id="add-custom-size" class="add-custom-size">Добавить кастомную
                характеристику</button>
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
        const oneSizeBlock = document.getElementById('one-size-block');
        const oneSizeCheckbox = document.getElementById('one-size');
        const oneSizeAmount = document.getElementById('one-size-amount');
        const sizeCheckboxes = document.querySelectorAll('.size-checkbox');
        const customSizeCheckbox = document.getElementById('custom_size_checkbox');
        const customSizesBlock = document.getElementById('custom_sizes_block');
        const customSizesContainer = document.getElementById('custom-sizes-container');
        const addCustomSizeButton = document.getElementById('add-custom-size');
        const form = document.querySelector('.registerForm');

        // При изменении категории
        categorySelect.addEventListener('change', function () {
            const selectedCategory = categorySelect.options[categorySelect.selectedIndex].text.toLowerCase();

            if (selectedCategory.includes('одежда')) {
                sizesBlock.style.display = 'block';
                oneSizeBlock.style.display = 'none';
                resetOneSize();
            } else {
                sizesBlock.style.display = 'none';
                oneSizeBlock.style.display = 'block';
                resetSizes();
            }
        });

        // Сброс выбора размеров
        function resetSizes() {
            sizeCheckboxes.forEach((checkbox) => {
                checkbox.checked = false;
                checkbox.nextElementSibling.disabled = true;
                checkbox.nextElementSibling.value = ''; // Очистка полей
            });
        }

        // Сброс "Один размер"
        function resetOneSize() {
            oneSizeCheckbox.checked = false;
            oneSizeAmount.disabled = true;
            oneSizeAmount.value = '';
        }

        // Обработка чекбокса "Один размер"
        oneSizeCheckbox.addEventListener('change', function () {
            if (oneSizeCheckbox.checked) {
                disableAllSizes();
                oneSizeAmount.disabled = false;
            } else {
                enableAllSizes();
                oneSizeAmount.disabled = true;
                oneSizeAmount.value = '';
            }
        });

        // Отключить все размеры
        function disableAllSizes() {
            sizeCheckboxes.forEach((checkbox) => {
                checkbox.checked = false;
                checkbox.nextElementSibling.disabled = true;
                checkbox.nextElementSibling.value = ''; // Очистка полей
            });
        }

        // Включить все размеры
        function enableAllSizes() {
            sizeCheckboxes.forEach((checkbox) => {
                checkbox.nextElementSibling.disabled = false;
            });
        }

        // Обработка изменения состояния чекбоксов для размеров
        sizeCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function () {
                const sizeInput = checkbox.nextElementSibling; // Ссылка на поле ввода для количества
                if (checkbox.checked) {
                    sizeInput.disabled = false; // Включаем поле ввода
                } else {
                    sizeInput.disabled = true; // Отключаем поле ввода
                    sizeInput.value = ''; // Очищаем поле ввода
                }
            });
        });

        customSizeCheckbox.addEventListener('change', function () {
            if (customSizeCheckbox.checked) {
                customSizesBlock.style.display = 'block';
            } else {
                customSizesBlock.style.display = 'none';
                // Удаляем ранее добавленные кастомные размеры
                customSizesContainer.innerHTML = '';
            }
        });

        // Функция для добавления нового поля кастомного размера
        let customSizeCount = 0;

        addCustomSizeButton.addEventListener('click', function () {
            customSizeCount++;

            const customSizeDiv = document.createElement('div');
            customSizeDiv.classList.add('custom-size');

            const customSizeName = document.createElement('input');
            customSizeName.type = 'text';
            customSizeName.name = `sizes[custom_name_${customSizeCount}]`;
            customSizeName.placeholder = 'Введите название характеристики';

            const customSizeQuantity = document.createElement('input');
            customSizeQuantity.type = 'number';
            customSizeQuantity.name = `sizes[custom_quantity_${customSizeCount}]`;
            customSizeQuantity.placeholder = 'Введите количество товара';

            customSizeDiv.appendChild(customSizeName);
            customSizeDiv.appendChild(customSizeQuantity);
            customSizesContainer.appendChild(customSizeDiv);
        });
        form.addEventListener('submit', function (event) {
    // Логирование данных формы перед отправкой
    const formData = new FormData(form);
    for (let [name, value] of formData.entries()) {
        console.log(name, value);  // Логируем каждое поле и его значение
    }
});


        form.addEventListener('submit', function (event) {
    // Проверяем, если установлен чекбокс "Свои размеры"
    if (customSizeCheckbox.checked) {
        // Удаляем старые скрытые поля с именами custom_name
        const hiddenInputs = form.querySelectorAll('input[name^="sizes[custom_name_"]"]');
        hiddenInputs.forEach(input => input.remove());

        const customSizeDivs = customSizesContainer.querySelectorAll('.custom-size');
        customSizeDivs.forEach((customSizeDiv) => {
            const customName = customSizeDiv.querySelectorAll('input')[0].value.trim(); // Название характеристики
            const customQuantity = customSizeDiv.querySelectorAll('input')[1].value.trim(); // Количество

            if (customName && customQuantity) {
                // Создаем скрытое поле с названием характеристики в качестве имени
                const customInput = document.createElement('input');
                customInput.type = 'hidden';
                customInput.name = `sizes[${customName}]`;  // Используем название характеристики как имя поля
                customInput.value = customQuantity; // Значение — это количество

                form.appendChild(customInput); // Добавляем скрытое поле в форму
                
                // Для отладки: логируем данные перед отправкой
                console.log('Создано скрытое поле для custom_name:', customName, ' с количеством:', customQuantity);
            }
        });
    }
});


    });

</script>
@endsection