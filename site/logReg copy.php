<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

<div class="card-form card-form-login">
    <form class="rd-form rd-mailform" novalidate="novalidate" id="enterForm">
        <div class="form-wrap">
            <label class="form-label rd-input-label" for="elogin">Login</label>
            <input class="form-input form-control-has-validation form-control-last-child" id="elogin" type="text" name="login" required>
            <span class="form-validation"></span>
        </div>
        <div class="form-wrap">
            <label class="form-label rd-input-label" for="epassword">Password</label>
            <input class="form-input form-control-has-validation form-control-last-child" id="epassword" type="password" name="password" required>
            <span class="form-validation"></span>
        </div>
        <button class="button button-lg button-primary button-block" type="submit">Войти</button>
    </form>

    <div class="group-sm group-sm-justify group-middle">
        <a class="button button-telegram button-icon button-icon-left button-round" href="#"><span class="icon fa fa-telegram"></span><span>Telegram</span></a>
        <a class="button button-vk button-icon button-icon-left button-round" href="#"><span class="icon fa fa-vk"></span><span>Vk</span></a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function() {
    $('#enterForm').on('submit', function(e) {
        e.preventDefault(); // Предотвращаем стандартное поведение формы
        var formData = $(this).serialize(); // Сериализуем данные формы

        $.ajax({
            url: 'enter.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    toastr.error(response.message);
                } else if (response.status === 'success') {
                    toastr.success(response.message);
                    // Перенаправляем на index.php после успешного входа
                    window.location.href = 'index.php';
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Произошла ошибка при отправке данных.');
            }
        });
    });
});
</script>

</body>
</html>
