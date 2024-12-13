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

document.addEventListener('DOMContentLoaded', function() {
    var thumbnails = document.querySelectorAll('.slider-image');
    var fullPhoto = document.querySelector('.image-wrapper__product-image img');

    thumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function(evt) {
            evt.preventDefault();
            var imgSrc = this.querySelector('img').src;
            fullPhoto.src = imgSrc;
        });
    });
});


var popup = document.querySelector('.modal');
var openPopupButton = document.querySelector('.pop-open');
var closePopupButton = popup.querySelector('.button-close');


openPopupButton.addEventListener('click', function (evt) {
    evt.preventDefault(); 
    popup.classList.add('modal_show');
});


document.addEventListener('keydown', function(evt){
    if(evt.code === 'Escape'){
        popup.classList.remove('modal_show');
    }
});
