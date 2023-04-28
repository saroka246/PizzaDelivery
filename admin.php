<?php
        require_once("templates/header.php");
        include_once "./utils/functions.php";
?>
        <main>
            <div class="wrapper admin__wrapper">
                <div class="container">
                  <h2>Заказы</h2>
                   <?php
                    $sql = "SELECT * FROM orders";
                    $res = $mysqli -> query($sql);
                    if ($res -> num_rows > 0) {
                        while ( $resPost = $res -> fetch_assoc()) {
                    ?>
                   
                        <div class="admin__item">
                            <div class="admin__item--number"><?= $resPost["number"] ?>)</div>
                            <div class="admin__item--name"><?= $resPost["name"] ?></div>
                            <div class="admin__item--phone"><?= $resPost["phone"] ?></div>
                            <div class="admin__item--address"><?= $resPost["address"] ?></div>
                            <div class="admin__item--price"><?= $resPost["price"] ?>₽</div>
                            <div class="admin__item--details"><?= $resPost["details"] ?></div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </main>
<?php
        require_once("templates/footer.php");
?>