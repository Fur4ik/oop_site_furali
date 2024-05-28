// Функция для загрузки данных
function loadPhoneprod() {
    // Загрузка данных о продуктах
    fetch('get_phoneprod.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
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
                    <div class="badge badge-secondary">${phoneprod.pricePhoneprod}</div>
                </div>
                <hr/>
                <div class="post-future-text">
                    <p>${phoneprod.descriptionPhoneprod}</p>
                </div>
                <div class="post-future-footer group-flex group-flex-xs">
                    <a class="button button-gray-outline" href="#">В корзину</a>
                </div>
            </div>
        </article>
        `;
        productsContainer.appendChild(div);
    });
})
        .catch(error => console.error('Error loading products:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadPhoneprod;
