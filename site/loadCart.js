function loadCart() {
    fetch('js/get_prodcart.php')
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

            const tableBody1 = document.getElementById('cartTable1');
            tableBody1.innerHTML = '';

            data.data.forEach(product => {
                const row = document.createElement('tr');
                row.setAttribute('data-product-id', product.idProd);
                row.innerHTML = `
                    <td>
                        <div class="product-cart-name">
                            <a class="product-cart-media"><img src="${product.imageProducts}" alt="ezthe" width="128" height="118"></a>
                            <p class="product-cart-title"><a href="carDealership.php">${product.nameProducts}</a></p>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="stepper-modern">
                            <div class="stepper">
                                <input class="form-input stepper-input" type="number" data-zeros="true" data-product-id="${product.idProd}" value="${product.countProd}" min="1" max="100" oninput="updateCart(${product.idProd}, this.value)">
                                <span class="stepper-arrow up" onclick="incrementValue(${product.idProd})"></span>
                                <span class="stepper-arrow down" onclick="decrementValue(${product.idProd})"></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-price"><span>${product.priceProducts * product.countProd} ₽</span></div>
                    </td>
                    <td>
                        <div class="product-cart-delete"><span class="icon fl-bigmug-line-recycling10" onclick="deleteFromCart(${product.idProd})"></span></div>
                    </td>
                `;
                tableBody1.appendChild(row);
            });
        })
        .catch(error => console.error('Error loading cart:', error));


    fetch('js/get_prodPhonecart.php')
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

            const tableBody2 = document.getElementById('cartTable2');
            tableBody2.innerHTML = '';

            data.data.forEach(product => {
                const row = document.createElement('tr');
                row.setAttribute('data-product-id', product.idProd);
                row.innerHTML = `
                    <td>
                        <div class="product-cart-name">
                            <a class="product-cart-media"><img src="${product.imagePhoneprod}" alt="ezthe" width="128" height="118"></a>
                            <p class="product-cart-title"><a href="carDealership.php">${product.namePhoneprod}</a></p>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="stepper-modern">
                            <div class="stepper">
                                <input class="form-input stepper-input" type="number" data-zeros="true" data-product-id="${product.idProd}" value="${product.countProd}" min="1" max="100" oninput="updateCart(${product.idProd}, this.value)">
                                <span class="stepper-arrow up" onclick="incrementValue(${product.idProd})"></span>
                                <span class="stepper-arrow down" onclick="decrementValue(${product.idProd})"></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-price"><span>${product.pricePhoneprod * product.countProd} ₽</span></div>
                    </td>
                    <td>
                        <div class="product-cart-delete"><span class="icon fl-bigmug-line-recycling10" onclick="deleteFromCart(${product.idProd})"></span></div>
                    </td>
                `;
                tableBody2.appendChild(row);
            });
        })
        .catch(error => console.error('Error loading cart:', error));


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

            const categoriesContainer = document.querySelector('.cart-inline-toggled-outer'); 
            categoriesContainer.innerHTML = ''; // Очистка контейнера перед добавлением новых данных

            const div = document.createElement('a');
            div.href = 'cart.php';

            div.innerHTML = `
            <button class="link link-cart toggle-original" data-rd-navbar-toggle="#cart-inline">
                <span class="link-cart-icon fl-bigmug-line-shopping202"></span>
                <span class="link-cart-counter">${data.cart_count}</span>
            </button>
            `;
            categoriesContainer.appendChild(div);
        })
        .catch(error => console.error('Error loading cart data:', error));

}

// Функция для обновления количества товара в корзине
function updateCart(productId, newCount) {
    fetch('js/update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ idProd: productId, countProd: newCount })

    })
    
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (!data.success) {
            alert('Ошибка при обновлении корзины: ' + data.message);
        } else {
            loadCart(); // Перезагружаем корзину
        }
    })
    .catch(error => console.error('Error updating cart:', error));
}


// Функция для удаления товара из корзины
function deleteFromCart(productId) {
    fetch('js/delete_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ idProd: productId })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (!data.success) {
            alert('Ошибка при удалении товара из корзины: ' + data.message);
        } else {
            loadCart(); // Перезагружаем корзину
            // Успешно удаленный товар, удаляем строку из таблицы
            const rowToDelete = document.querySelector(`tr[data-product-id="${productId}"]`);
            if (rowToDelete) {
                rowToDelete.remove();
            }
        }
    })    
    .catch(error => console.error('Error deleting from cart:', error));
}

function incrementValue(productId) {
    var input = document.querySelector(`input[data-product-id="${productId}"]`);
    var newValue = parseInt(input.value) + 1;
    input.value = newValue > 100 ? 100 : newValue; // Ограничиваем значение до максимального
    updateCart(productId, input.value); // Вызываем функцию обновления корзины
}

function decrementValue(productId) {
    var input = document.querySelector(`input[data-product-id="${productId}"]`);
    var newValue = parseInt(input.value) - 1;
    input.value = newValue < 1 ? 1 : newValue; // Ограничиваем значение до минимального
    updateCart(productId, input.value); // Вызываем функцию обновления корзины
}



// Загружаем данные при загрузке страницы
window.onload = loadCart;


