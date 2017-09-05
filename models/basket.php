<?php
// подключаемся к базе
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
include("/bd.inc.php");
function QuantityOfBasket($id){
    global $db;
    $sql = "SELECT SUM(quantity) FROM `basket` WHERE user_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_row($result);
}