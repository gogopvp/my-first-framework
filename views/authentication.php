<html>
<head>
    <meta charset="utf-8">
    <title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<!--****  authentication.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
<form action="/authentication/authentication" method="post">

    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
    <p>
        <label>Ваш логин:<br></label>
        <input name="login" type="text" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
    <p>

        <label>Ваш пароль:<br></label>
        <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
    <p>
        <input type="submit" name="submit" value="Войти">


        <br>
        <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->
        <a href="/registration/index">Зарегистрироваться</a>
    </p></form>
<br>
<?php
echo($massageForUser);
?>
</body>
</html>