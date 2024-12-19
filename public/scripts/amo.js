document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.querySelector('.image-wrapper__product-image img');
    const thumbnails = document.querySelectorAll('.preview-list img');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });

    // Size selector functionality
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    const quantityDisplay = document.getElementById('quantity-display');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            quantityDisplay.textContent = this.dataset.amount;
        });
    });

    // Modal functionality
    const showPopup = document.getElementById('showPopup');
    const modal = document.querySelector('.modal');

    showPopup.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});