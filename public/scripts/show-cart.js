// это для слайдера-фото
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
document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.slider');

    sliders.forEach(slider => {
        const mainImage = slider.querySelector('.main-image');
        const thumbnails = slider.querySelectorAll('.slider-image');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function (event) {
                event.preventDefault();
                const fullImageUrl = this.getAttribute('data-full');
                mainImage.src = fullImageUrl; // Меняем главное изображение на выбранное
            });
        });
    });
});
