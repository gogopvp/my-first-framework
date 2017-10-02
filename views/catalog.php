<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <? //отображение пользователя который сейчас залогинен
    echo "Вы вошли на сайт как ".$currentUserLogin.".<br>";
    ?>
    <a href="../session_destroy.php">Выйти</a>
    <title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="../basket/index">корзине</a>
    <?php
    echo $quantityOfBasket[0];
    ?>:
</p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">

    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год издания</th>
        <th>Цена, руб.</th>
        <th>В корзину</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <?php

    if($goods === false){
        echo "Произошла ошибка!";
        exit;
    }
    foreach($goods as $item){
        ?>
        <tr>
            <td><?= $item['title']?></td>
            <td><?= $item['author']?></td>
            <td><?= $item['pubyear']?></td>
            <td><?= $item['price']?></td>
            <td><a href="addToBasket/?id=<?= $item['id']?>">В корзину</a></td>
            <td><a href="aboutProduct/?id=<?= $item['id']?>">Edit</a></td>
            <td><a href="deleteFromCatalog/?id=<?= $item['id']?>">Delete</a></td>
        </tr>
        <?
    }
    ?>
</table>
<p>Добавить новый товар в таблицу <a href="insertForm">каталог</a>.</p>
</body>
</html>