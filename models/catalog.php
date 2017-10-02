<?php
require "/bd.inc.php";
function selectAllItems(){
    global $dbConnection;
    $selectAllItemsFromCatalog = "SELECT id, title, author, pubyear, price FROM catalog";
    if(!$AllItemsFromCatalog = mysqli_query($dbConnection, $selectAllItemsFromCatalog))
        return false;
    $goods = mysqli_fetch_all($AllItemsFromCatalog, MYSQLI_ASSOC);
    mysqli_free_result($AllItemsFromCatalog);
    return $goods;
}

function aboutProductId($productId){
    global $dbConnection;
    $selectAllAboutProductId = "SELECT * FROM catalog WHERE id=$productId";
    $allAboutProductId=mysqli_query($dbConnection, $selectAllAboutProductId);
    $allAboutProductId = mysqli_fetch_assoc($allAboutProductId);
    return $allAboutProductId;
}

function updateCatalog($author,$title,$pubyear,$price,$productId){
    global $dbConnection;
    $updateCatalog = "UPDATE `catalog`  
        SET                
                           `author`='".$author."',
                           `title`='".$title."',
                           `pubyear`='".$pubyear."',
                           `price` = '".$price."'
        WHERE 
                           `id` = '".$productId."'";
    mysqli_query($dbConnection, $updateCatalog);
}

function deleteItemFromCatalog($productId){
    global $dbConnection;
    $deleteItem = "DELETE FROM catalog WHERE id=$productId";
    mysqli_query($dbConnection, $deleteItem);

}

function insertIntoCatalog($title,$author,$pubyear,$price){
    global $dbConnection;
    $insertNewItem = "INSERT INTO `catalog` (title,author,pubyear,price)
        VALUES
                            ('".$title."',
                             '".$author."',
                             '".$pubyear."',
                             '".$price."')";
    mysqli_query($dbConnection, $insertNewItem);
}