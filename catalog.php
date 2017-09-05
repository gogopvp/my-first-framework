<?php
session_start();
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    header("Location: ../index.php");
}
// подключение библиотек

require "/models/basket.php";
error_reporting(0);

$login = $_SESSION['login'];
$id = $_SESSION['id'];
$myrow = QuantityOfBasket($id);
include ("/views/catalog.php");
?>