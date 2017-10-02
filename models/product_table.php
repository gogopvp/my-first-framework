<?php
// подключаемся к базе
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
require "/bd.inc.php";
function quantityOfBasket($currentUserId){
    global $dbConnection;
    $quantityOfBasket = "SELECT SUM(quantity) FROM `product_table` WHERE user_id='" . $currentUserId . "'";
    $sumOfQuantitys = mysqli_query($dbConnection, $quantityOfBasket);
    return mysqli_fetch_row($sumOfQuantitys);
}

function addToBasket($productId){
    global $dbConnection;
    $ifProductIsAdded = "SELECT * FROM `product_table` WHERE `user_id`='".$_SESSION['id']."' AND `product_id`=$productId";
    $aboutProduct=mysqli_query($dbConnection, $ifProductIsAdded);
    $aboutProduct=mysqli_fetch_row($aboutProduct);

    if($aboutProduct['2']==$productId){
        $incrementQuantityOfProduct="UPDATE `product_table` SET `quantity`=`quantity`+1 WHERE `user_id`='".$_SESSION['id']."' AND `product_id`=$productId";
        mysqli_query($dbConnection, $incrementQuantityOfProduct);
    }
    else {
        $addProductInBasket="INSERT INTO `product_table`(`user_id`,`product_id`) VALUES ('".$_SESSION['id']."',$productId)";
        mysqli_query($dbConnection, $addProductInBasket);
    }
}

function absoulutelyDeleteItemFromBasket($productId){
    global $dbConnection;
    $deleteItemFromBasket = "DELETE FROM `product_table` WHERE `product_id`=$productId";
    mysqli_query($dbConnection, $deleteItemFromBasket);
}

function selectAllItemsFromBasket($currentUserId){
    global $dbConnection;
    $selectGoodsForUserId="SELECT c.id, c.title, c.author, c.pubyear, c.price, p.quantity 
          FROM catalog c INNER JOIN product_table p ON c.id = p.product_id
          WHERE p.user_id='".$currentUserId."'";
    if(!$goodsForUserId = mysqli_query($dbConnection, $selectGoodsForUserId))
        return false;
    $goods = mysqli_fetch_all($goodsForUserId, MYSQLI_ASSOC);
    mysqli_free_result($goodsForUserId);
    return $goods;
}

function deleteItemFromBasket($productId){
    global $dbConnection;
    $quantityOfItem = "SELECT quantity FROM product_table WHERE product_id = $productId";
    $quantityOfItem = mysqli_query($dbConnection, $quantityOfItem);
    $quantityOfItem = mysqli_fetch_row($quantityOfItem);
    if ($quantityOfItem['0']>1){
        $decrementQuantityOfItem="UPDATE `product_table` SET `quantity`=`quantity`-1 WHERE `product_id`=$productId";
        mysqli_query($dbConnection, $decrementQuantityOfItem);
    }
    else {
        $deleteItemFromBasket = "DELETE FROM `product_table` WHERE `product_id`=$productId";
        mysqli_query($dbConnection, $deleteItemFromBasket);
    }
}