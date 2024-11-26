// это для слайдера-фото
var thumbnails = document.querySelectorAll('.preview-list li');
var fullPhoto = document.querySelector('.active-photo');

var addThumbnailClickHandler = function (thumbnail) {
    thumbnail.addEventListener('click', function (evt) {
        evt.preventDefault();
        var imgSrc = this.querySelector('img').src;
        fullPhoto.src = imgSrc;
    });
};

thumbnails.forEach(addThumbnailClickHandler);

//это для выбора размера

document.addEventListener('DOMContentLoaded', function() {
    const sizeButtons = document.querySelectorAll('.size-button');
    const selectedSizeInput = document.getElementById('selected_size');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            sizeButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            selectedSizeInput.value = this.getAttribute('data-size');
        });
    });

    // Инициализация первого кнопки
    sizeButtons[0].classList.add('active');
    selectedSizeInput.value = sizeButtons[0].getAttribute('data-size');
});