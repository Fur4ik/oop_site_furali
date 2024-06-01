// Функция для загрузки данных
function loadPhoneprod() {
    // Загрузка данных о продуктах
    fetch('js/get_phoneprod.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            resCount();
    const productsContainer = document.querySelector('.row-30'); // выбираем контейнер для продуктов на вашем сайте
    data.forEach(phoneprod => {

        const div = document.createElement('div');
        div.classList.add('col-md-6');

        div.innerHTML = `
        <article class="post-future">
            <a class="post-future-figure"><img src="${phoneprod.imagePhoneprod}" alt="" width="368" height="287"/></a>
            <div class="post-future-main">
                <h4 class="post-future-title"><a>${phoneprod.namePhoneprod}</a></h4>
                <div class="post-future-meta">
                    <div class="badge badge-secondary">${phoneprod.pricePhoneprod}₽</div>
                </div>
                <hr/>
                <div class="post-future-text">
                    <p>${phoneprod.descriptionPhoneprod}</p>
                </div>
                <div class="post-future-footer group-flex group-flex-xs">
                    <button class="button button-gray-outline" onclick="addToCart('${phoneprod.articlePhoneprod}')">В корзину</button>
                </div>
            </div>
        </article>
        `;
        productsContainer.appendChild(div);
    });
})
        .catch(error => console.error('Error loading products:', error));

}


function resCount(){
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

// Функция для добавления продукта в корзину
function addToCart(articleProducts) {
    fetch('js/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ articleProducts: articleProducts })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Продукт добавлен в корзину');
            resCount();
        } else {
            alert('Ошибка при добавлении продукта в корзину');
        }
    })
    .catch(error => console.error('Error adding product to cart:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadPhoneprod;
