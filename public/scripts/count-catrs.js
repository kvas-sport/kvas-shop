function incrementCount() {
    const countInfo = document.querySelector('.count .trangl.count-info');
    let currentCount = parseInt(countInfo.textContent);
    currentCount++;
    countInfo.textContent = currentCount;
}

function decrementCount() {
    const countInfo = document.querySelector('.count .trangl.count-info');
    let currentCount = parseInt(countInfo.textContent);
    if (currentCount > 1) {
        currentCount--;
    }
    countInfo.textContent = currentCount;
}

document.querySelectorAll('.count .trangl.plus-btn img').forEach(img => {
    img.addEventListener('click', incrementCount);
});

document.querySelectorAll('.count .trangl.minus-btn img').forEach(img => {
    img.addEventListener('click', decrementCount);
});
