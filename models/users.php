<?php
// подключаемся к базе
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
include("/bd.inc.php");
function CheckUser($login)
{
    global $db;
    //извлекаем из базы все данные о пользователе с введенным логином
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
    return (mysqli_fetch_assoc($result));
}
function IfRegistrated($login,$password){
    global $db;
// если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db,"INSERT INTO users (login,password) 
                                VALUES    
                                        ('".$login."',
                                         '".$password."')");
    return $result2;
}