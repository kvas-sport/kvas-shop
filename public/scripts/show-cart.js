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
