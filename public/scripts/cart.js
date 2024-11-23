const addToCartButtons = document.querySelectorAll('.add-to-carts');

addToCartButtons.forEach((addToCartButton) => (
    addToCartButton.addEventListener('click', function() {
        localStorage.setItem('product', addToCartButton.value);
    })
))
