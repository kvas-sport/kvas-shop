document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="characteristic_id"]');
    const quantityDisplay = document.getElementById('quantity-display');

    quantityDisplay.textContent = radios[radios.length - 1].dataset.amount;

    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            quantityDisplay.textContent = this.dataset.amount;
        });
    });
});
