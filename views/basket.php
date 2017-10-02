<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?
    echo "Вы вошли на сайт как ".$_SESSION['login'].".<br>";
    ?>
    <a href="../session_destroy.php">Выйти</a>
    <title>Корзина пользователя</title>
</head>
<body>
<h1>Ваша корзина</h1>
<?php
echo "<br>";
if($quantityOfBasket['0']==0){
    echo "<p>Товаров нет. Верниесь в <a
    href='/catalog/index'>каталог</a>";
    exit;
}else{
    echo "<p>Вернуться в <a
    href='/catalog/index'>каталог</a>";
}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год издания</th>
        <th>Цена, руб.</th>
        <th>Количество</th>
        <th>Удалить</th>
    </tr>
    <?php
    $sumOfPrices = 0;
    //print_r($goods);
    if($goods === false){
        echo "Произошла ошибка!";
        exit;
    }
    foreach($goods as $item) {
        ?>
        <tr>
            <td><?= $item['title'] ?></td>
            <td><?= $item['author'] ?></td>
            <td><?= $item['pubyear'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td><a href="deleteFromBasket/?id=<?= $item['id'] ?>">Удалить</a></td>
        </tr>
        <?
        $sumOfPrices += $item['price'] * $item['quantity'];
    }
    ?>
</table>

<p>Всего товаров в корзине на сумму: <?=$sumOfPrices?>руб.</p>

<div align="center">
    <input type="button" value="Оформить заказ!"
           onClick="location.href='orderform.php'" />
</div>

</body>
</html>