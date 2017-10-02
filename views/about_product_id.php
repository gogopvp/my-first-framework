<form action="/catalog/updateCatalog" method="post">
    title: <input value="<?php echo $aboutProduct["title"]?>" type="text" name="title"><br>
    author: <input value="<?php echo $aboutProduct["author"]?>" type="text" name="author"><br>
    pubyear: <input value="<?php echo $aboutProduct["pubyear"]?>" type="text" name="pubyear"><br>
    price: <input value="<?php echo $aboutProduct["price"]?>" type="text" name="price"><br>
    <input value="<?= $productId?>" type="hidden" name="id">
    <input type="submit" value="Submit">
</form>


