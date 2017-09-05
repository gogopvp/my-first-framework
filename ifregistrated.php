<?php
session_start();
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    $regist="Вы ввели не всю информацию, заполните все поля!";
    header("Location: ../index.php");
}
