// Функция для загрузки данных
function loadCategories() {
    // Загрузка данных о продуктах
    fetch('get_categories.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
    const categoriesContainer = document.querySelector('.row-30'); // выбираем контейнер для продуктов на вашем сайте
    data.forEach(categories => {
        
        const div = document.createElement('div');
        div.classList.add('col-md-6-index');

        div.innerHTML = `
        <article class="post-future">
            <a class="post-future-figure"><img src="${categories.imageСategories}" alt="" width="368" height="287"/></a>
            <div class="post-future-main">
                <h4 class="post-future-title"><a>${categories.nameСategories}</a></h4>
                <div class="post-future-meta">
                    <div class="badge badge-secondary">${categories.secondnameСategories}</div>
                </div>
                <hr/>
                <div class="post-future-text">
                    <p>${categories.descriptionСategories}</p>
                </div>
                <div class="post-future-footer group-flex group-flex-xs">
                    <a class="button button-gray-outline" href="${categories.urlCategories}">Подробнее</a>
                </div>
            </div>
        </article>
        `;
        categoriesContainer.appendChild(div);
    });
})
        .catch(error => console.error('Error loading products:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadCategories;
