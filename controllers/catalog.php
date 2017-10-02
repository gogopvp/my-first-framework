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
        $goods = selectAllItems();
        include ("/views/catalog.php");
    break;

    case "addToBasket":
        addToBasket($productId);
        header("Location: ../index");
    break;

    case "aboutProduct":
        $aboutProduct = aboutProductId($productId);
        include ("/views/about_product_id.php");
    break;

    case "updateCatalog":
        $author = clearInput($_POST['author']);
        $title = clearInput($_POST['title']);
        $pubyear = clearInput($_POST['pubyear']);
        $price = clearInput($_POST['price']);
        $productId = clearInput($_POST['id']);
        updateCatalog($author,$title,$pubyear,$price,$productId);
        header("Location: /catalog/index");
    break;

    case "deleteFromCatalog":
        deleteItemFromCatalog($productId);
        absoulutelyDeleteItemFromBasket($productId);
        header("Location: ../index");
    break;

    case "insertForm":
        include ("/views/insert_into_catalog.php");

    break;

    case "insertIntoCatalog":
        $author = clearInput($_POST['author']);
        $title = clearInput($_POST['title']);
        $pubyear = clearInput($_POST['pubyear']);
        $price = clearInput($_POST['price']);
        insertIntoCatalog($title,$author,$pubyear,$price);
        header("Location: /catalog/index");
    break;
}