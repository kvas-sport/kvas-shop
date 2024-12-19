document.addEventListener('DOMContentLoaded', function() {
    const readMoreLinks = document.querySelectorAll('.read-more');

    readMoreLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Предотвращаем переход по ссылке
            const hiddenReview = this.nextElementSibling; // Находим скрытый текст

            // Проверяем текущее состояние элемента
            if (hiddenReview.style.display === 'none' || hiddenReview.style.display === '') {
                hiddenReview.style.display = 'block'; // Показываем скрытый текст
                this.textContent = 'Скрыть'; // Меняем текст ссылки
            } else {
                hiddenReview.style.display = 'none'; // Скрываем текст
                this.textContent = 'Читать ещё'; // Возвращаем текст ссылки
            }
        });
    });
});

document.querySelectorAll('.read-more').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем переход по ссылке
        const hiddenReview = this.previousElementSibling.querySelector('.hidden-review');
        if (hiddenReview) {
            hiddenReview.style.display = hiddenReview.style.display === 'none' ? 'block' : 'none';
            this.textContent = hiddenReview.style.display === 'block' ? 'Скрыть' : 'Читать ещё';
        }
    });
});
