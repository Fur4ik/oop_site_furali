function loadUsers() {
    fetch('get_users.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('usersTable');
            data.forEach(users => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${users.idUsers}</td>
                    <td>${users.loginUsers}</td>
                    <td>${users.emailUsers}</td>
                    <td><button onclick="deleteUser(${users.idUsers})">Удалить</button></td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error loading users:', error));
}

// Загружаем данные при загрузке страницы
window.onload = loadUsers;

function deleteUser(idUsers) {
    if (confirm("Вы уверены, что хотите удалить этого пользователя?")) {
        fetch(`delete_user.php?id=${idUsers}`, {

            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(message => {
            alert(message);
            location.reload(); // Перезагружаем страницу для обновления таблицы
        })
        .catch(error => console.error('Error deleting user:', error));
    }
}
