// Функция для загрузки данных
function loadCategories() {
    // Загрузка данных о корзине
    fetch('js/update_cart_count.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                throw new Error('Ошибка загрузки корзины: ' + data.message);
            }

            const categoriesContainer = document.querySelector('.product-cart-footer'); // выбираем контейнер для продуктов на вашем сайте
            categoriesContainer.innerHTML = ''; // Очистка контейнера перед добавлением новых данных

            const div = document.createElement('div');
            div.classList.add('product-cart-total');

            div.innerHTML = `
                <span>Общая стоимость</span>
                <span class="product-cart-total-price">
                    <span>${data.cart_summ}</span>
                    <span>₽</span>
                </span>
                <a class="button button-lg button-primary" href="#">Оформить заказ</a>
            `;
            categoriesContainer.appendChild(div);
        })
        .catch(error => console.error('Error loading cart data:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadCategories;
