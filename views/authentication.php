<html>
<head>
    <meta charset="utf-8">
    <title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<!--****  authentication.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
<form action="/authentication.php" method="post">

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
        <a href="/registration.php">Зарегистрироваться</a>
    </p></form>
<br>
<?php
// Проверяем, пусты ли переменные логина и id пользователя
/*if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость";
}*/
echo($regist);
/*else
{

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
}
*/
?>
</body>
</html>