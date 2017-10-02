<?php
// подключаемся к базе
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
require "/bd.inc.php";
function checkingIfUserExists($currentUserLogin)
{
    global $dbConnection;
    //извлекаем из базы все данные о пользователе с введенным логином
    $resultOfChecking = mysqli_query($dbConnection, "SELECT * FROM users WHERE login='$currentUserLogin'");
    return (mysqli_fetch_assoc($resultOfChecking));
}
function RegisterUser($loginForNewRegistration,$passwordForNewRegistration){
    global $dbConnection;
// если такого нет, то сохраняем данные
    $isUserRegistred = mysqli_query ($dbConnection,"INSERT INTO users (login,password) 
                                VALUES    
                                        ('".$loginForNewRegistration."',
                                         '".$passwordForNewRegistration."')");
    return $isUserRegistred;
}