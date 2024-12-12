function updateCount(element) {
    const countInfo = element.querySelector('.trangl.count-info');
    let currentCount = parseInt(countInfo.textContent);
    
    // Функция для увеличения
    function increment() {
        currentCount++;
        countInfo.textContent = currentCount;
    }

    // Функция для уменьшения
    function decrement() {
        if (currentCount > 1) {
            currentCount--;
        }
        countInfo.textContent = currentCount;
    }

    // Обработчики событий
    element.querySelector('.trangl.plus-btn').addEventListener('click', increment);
    element.querySelector('.trangl.minus-btn').addEventListener('click', decrement);
}

// Вызываем функцию для каждой карточки
document.querySelectorAll('.count').forEach(updateCount);


function calculateTotal() {
    let total = 960;
    let no_delivered = 0;
    document.querySelectorAll('.count').forEach((countElement, index) => {
        const priceInput = countElement.closest('tr').querySelector('td.total span.cost');
        const quantityInfo = countElement.querySelector('.trangl.count-info');
        const priceValue = priceInput.textContent.trim();

        if (priceValue && quantityInfo) {
            const price = parseFloat(priceValue);
            const quantity = parseInt(quantityInfo.textContent);
            console.log(price)

            no_delivered += price * quantity;
            total += price * quantity ;
            console.log(total)
        }
    });
    document.querySelector('.price-one .cost').textContent = no_delivered.toFixed(2) + ' ₽';
    document.querySelector('.price-total-fin .cost').textContent = total.toFixed(2) + ' ₽';
}

document.addEventListener('DOMContentLoaded', calculateTotal);

document.querySelectorAll('.count .trangl.plus-btn').forEach(img => {
    img.addEventListener('click', calculateTotal);
});

document.querySelectorAll('.count .trangl.minus-btn').forEach(img => {
    img.addEventListener('click', calculateTotal);
});