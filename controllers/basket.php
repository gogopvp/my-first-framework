<?php

// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    header("Location: /authentication/index");
}
// подключение библиотек

require "/models/product_table.php";
require "/models/catalog.php";
require "/input_processing.php";
error_reporting(0);
$currentUserLogin = $_SESSION['login'];
$currentUserId = $_SESSION['id'];
$productId = intval($_GET["id"]);

switch ($action) {
    case "index":
        $quantityOfBasket = quantityOfBasket($currentUserId);
        $goods = selectAllItemsFromBasket($currentUserId);
        include ("/views/basket.php");
    break;

    case "deleteFromBasket":
        deleteItemFromBasket($productId);
        header("Location: /basket/index");
    break;
}