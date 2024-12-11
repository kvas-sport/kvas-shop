document.addEventListener('DOMContentLoaded', () => {
    let currentPage = 1;
    const loadMoreButton = document.querySelector('.open-more');
    const productContainer = document.querySelector('.product-cards');

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', () => {
            currentPage++;
            const url = new URL(loadMoreButton.dataset.url || window.location.href);
            url.searchParams.set('page', currentPage.toString());

            console.log(url);

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    productContainer.insertAdjacentHTML('beforeend', data.html);
                    if (!data.hasMore) {
                        loadMoreButton.remove();
                    }
                })
                .catch(error => console.error('Ошибка при загрузке:', error));
        });
    }
});
