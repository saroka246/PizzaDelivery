<?php
        require_once("templates/header.php");
        include_once "./utils/functions.php";
?>
        <main>
            <div class="wrapper filter__wrapper">
                <div class="container">
                    <form action="#" class="filter__form">
                       <?php
                        $sql = "SELECT * FROM categories";
                        $res = $mysqli -> query($sql);
                        if ($res -> num_rows > 0) {
                            while ( $resCat = $res -> fetch_assoc()) {
                                ?>
                                <div class="filter__item">
                                    <input class="custom-checkbox" type="checkbox" id="cat<?= $resCat["id"] ?>" name="cat<?= $resCat["id"] ?>" value="<?= $resCat["id"] ?>">
                                    <label for="cat<?= $resCat["id"] ?>"><?= $resCat["category_name"] ?></label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
            <div class="wrapper main__wrapper">
                <div class="container">
                   <?php post_loop_catalog($mysqli); ?>
                </div>
            </div>
        </main>
<?php
        require_once("templates/footer.php");
?>