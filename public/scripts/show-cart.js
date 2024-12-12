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
