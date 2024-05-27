// Функция для загрузки данных
function loadData() {
    // Загрузка данных о клиентах
    fetch('get_clients.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('clientsTable');
            data.forEach(client => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${client.id}</td>
                    <td>${client.firstname}</td>
                    <td>${client.lastname}</td>
                    <td>${client.email}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error loading clients:', error));

    // Загрузка данных о продуктах
    fetch('get_products.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('productsTable');
            data.forEach(products => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${products.idProducts}</td>
                    <td>${products.articleProducts}</td>
                    <td>${products.nameProducts}</td>
                    <td>${products.descriptionProducts}</td>
                    <td>${products.priceProducts}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error loading products:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadData;
