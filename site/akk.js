document.addEventListener("DOMContentLoaded", function() {
    var loginLink = document.getElementById("loginLink");
    var modal = document.getElementById("logoutModal");
    var span = document.getElementsByClassName("closeAkk")[0];
    var confirmLogout = document.getElementById("confirmLogout");
    var cancelLogout = document.getElementById("cancelLogout");

    loginLink.onclick = function(event) {
        event.preventDefault();

        fetch('check_session.php')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'logged_in') {
                    // Показать модальное окно выхода
                    modal.style.display = "block";
                } else {
                    // Перенаправить на страницу логина и регистрации
                    window.location.href = 'logReg.php'; 
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    span.onclick = function() {
        modal.style.display = "none";
    };

    cancelLogout.onclick = function() {
        modal.style.display = "none";
    };

    confirmLogout.onclick = function() {
        window.location.href = 'logout.php';
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});