<?php
        require_once("templates/header.php");
        include_once "./utils/functions.php";
?>
        <main class="wrapper order__wrapper">
           <div class="container">
               <?php 
                    if(isset($_SESSION["cart_list"])){ 
                        if(count($_SESSION["cart_list"]) == 0){
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <div class="minicart__order--wrapper"><a href="http://localhost/delivery/pizza.php" class="minicart__order">Перейти к покупкам</a></div>
                        <?php    
                        } else {
                        ?>
                        <h2 class="count">Кол-во товаров: <span><?= count($_SESSION["cart_list"]); ?></span></h2>
                        <form action="#" class="order__form">
                        <?php  
                        $fullPrice = 0;
                        foreach($_SESSION["cart_list"] as $value){
                            $fullPrice+= round($value["price"]);
                        ?>
                        <div class="minicart__item">
                            <div class="minicart__item--number"></div>
                            <img src="<?= $value["image"] ?>" alt="">
                            <div class="minicart__item--name" data-price="<?= round($value["price"]); ?>"><?= $value["name"] ?></div>
                            <input type="number" value="<?= round($value["price"]); ?>" class="minicart__item--price">
                            <div class="number" data-step="1" data-min="1" data-max="20">
                                <button class="number-minus" type="button">-</button>
                                <input type="text" min="1" value="1" readonly required class="minicart__item--quantity">
                                <button class="number-plus" type="button">+</button>
                            </div>
                            <a href="#" class="minicart__item--remove" data-id="<?= $value["id"] ?>">
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.292894 18.2929C-0.0976309 18.6834 -0.0976312 19.3166 0.292893 19.7071C0.683417 20.0976 1.31658 20.0976 1.70711 19.7071L0.292894 18.2929ZM19.7071 1.70712C20.0976 1.3166 20.0976 0.683436 19.7071 0.292911C19.3166 -0.0976133 18.6834 -0.0976137 18.2929 0.29291L19.7071 1.70712ZM1.70711 0.292893C1.31658 -0.0976312 0.683417 -0.0976309 0.292893 0.292894C-0.0976312 0.683418 -0.0976309 1.31658 0.292894 1.70711L1.70711 0.292893ZM18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L18.2929 19.7071ZM1.70711 19.7071L19.7071 1.70712L18.2929 0.29291L0.292894 18.2929L1.70711 19.7071ZM0.292894 1.70711L18.2929 19.7071L19.7071 18.2929L1.70711 0.292893L0.292894 1.70711Z" fill="red"/>
                                </svg>
                            </a>
                        </div>
                        <?php 
                        }
                        ?>
                        <h2 class="price">К оплате:<span><?= $fullPrice ?></span>₽</h2>
                        <label for="name">Ваше имя:</label>
                        <input type="text" class="order__input" name="name" required>
                        <label for="phone">Ваш номер телефона:</label>
                        <input type="text" class="order__input" name="phone" required>
                        <label for="address">Ваш адрес:</label>
                        <input type="text" class="order__input" name="address" required>
                        <button type="submit">Оформить заказ</button>
                        </form>
                        <?php
                        }
                        
                    } else {
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <?php
                    }  
                    ?>
           </div>
            
        </main>
        
<?php
        require_once("templates/footer.php");
?>