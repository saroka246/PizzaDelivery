<?php
include_once "db.php"; 

function post_loop ($mysqli, $num) {
    $sql = "SELECT * FROM product";
    $i = 0;
    $res = $mysqli -> query($sql);
    if ($res -> num_rows > 0) {
        while ($i < $num && $resPost = $res -> fetch_assoc()) {
            $i++;
            ?>
                
                <div class="card">
                    <img src="<?= $resPost["image"] ?>" alt="">
                    <div class="card__title--container">
                        <div class="card__title"><?= $resPost["name"] ?></div>
                        <div class="card__subtitle">
                        <?php
                        $id = $resPost["id"];
                        $sql2 = "SELECT DISTINCT categories.category_name FROM categories INNER JOIN product_cat ON categories.id = product_cat.category_id WHERE product_cat.product_id=$id";
                        $res2 = $mysqli -> query($sql2);
                        if ($res2 -> num_rows > 0) {
                            while ($resCat = $res2 -> fetch_assoc()) {
                                ?>
                                <?= $resCat["category_name"] ?>
                                <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div class="card__btn--container">
                        <?php 
                        if(isset($_SESSION["cart_list"])){
                            $check = 0;
                            foreach($_SESSION["cart_list"] as $value){
                                if($value["id"] == $resPost["id"]){
                                    $check++;
                                } 
                            }
                            if($check == 0){
                                ?> 
                                <a href="#" class="card__btn" data-id="<?= $resPost["id"] ?>">В корзину</a>
                                <?php
                            } else {
                                ?> 
                                <a href="#" class="card__btn active" data-id="<?= $resPost["id"] ?>">Добавлено</a>
                                <?php 
                            }
                        } else {
                            ?> 
                            <a href="#" class="card__btn" data-id="<?= $resPost["id"] ?>">В корзину</a>
                            <?php
                        }
                        ?>
                        <div class="card__price"><span><?= $resPost["price"] ?></span>₽</div>
                    </div>
                </div>
                
            <?php
        }
    } else {
        echo "Нет пиццы";
    }
}
function post_loop_catalog ($mysqli) {
    $sql = "SELECT * FROM product";
    $res = $mysqli -> query($sql);
    if ($res -> num_rows > 0) {
        while ( $resPost = $res -> fetch_assoc()) {
            ?>
                <div class="card">
                    <img src="<?= $resPost["image"] ?>" alt="">
                    <div class="card__title--container">
                        <div class="card__title"><?= $resPost["name"] ?></div>
                        <div class="card__subtitle">
                        <?php
                        $id = $resPost["id"];
                        $sql2 = "SELECT DISTINCT categories.category_name FROM categories INNER JOIN product_cat ON categories.id = product_cat.category_id WHERE product_cat.product_id=$id";
                        $res2 = $mysqli -> query($sql2);
                        if ($res2 -> num_rows > 0) {
                            while ($resCat = $res2 -> fetch_assoc()) {
                                ?>
                                <?= $resCat["category_name"] ?>
                                <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div class="card__btn--container">
                        <?php 
                        if(isset($_SESSION["cart_list"])){
                            $check = 0;
                            foreach($_SESSION["cart_list"] as $value){
                                if($value["id"] == $resPost["id"]){
                                    $check++;
                                } 
                            }
                            if($check == 0){
                                ?> 
                                <a href="#" class="card__btn" data-id="<?= $resPost["id"] ?>">В корзину</a>
                                <?php
                            } else {
                                ?> 
                                <a href="#" class="card__btn active" data-id="<?= $resPost["id"] ?>">Добавлено</a>
                                <?php 
                            }
                        } else {
                            ?> 
                            <a href="#" class="card__btn" data-id="<?= $resPost["id"] ?>">В корзину</a>
                            <?php
                        }
                        ?>
                        <div class="card__price"><span><?= $resPost["price"] ?></span>₽</div>
                    </div>
                </div>
                
            <?php
        }
    } else {
        echo "Нет пиццы";
    }
}

function get_product_by_id($mysqli, $id){
    $sql = "SELECT * FROM product WHERE product.id=$id";
    $res = $mysqli -> query($sql);
    return $res -> fetch_assoc();
}
?>