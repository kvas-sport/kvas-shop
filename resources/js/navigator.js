document.addEventListener('DOMContentLoaded', function() {
    // Получаем текущий URL
    const currentUrl = window.location.href;

    // Находим все пункты навигации
    const navItems = document.querySelectorAll('.nav-item');

    // Проходим по всем пунктам
    navItems.forEach(item => {
        // Получаем URL из href
        const itemUrl = item.href;

        // Проверяем совпадение текущего URL с URL пункта меню
        if (currentUrl === itemUrl) {
            item.classList.add('active');
        }
    });
});
