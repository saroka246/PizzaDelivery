<footer class="wrapper">
            <div class="container">
                <a href="http://localhost/delivery/" class="footer__logo">pizza delivery</a>
                <div class="copyright">© 2022 Pizza Delivery</div>
                <a href="tel:#" class="phone">8(800) 55 35 35</a>
            </div>
        </footer>
        <div class="minicart__wrapper">
            <div class="minicart__container">
                <div class="close__btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292894 18.2929C-0.0976309 18.6834 -0.0976312 19.3166 0.292893 19.7071C0.683417 20.0976 1.31658 20.0976 1.70711 19.7071L0.292894 18.2929ZM19.7071 1.70712C20.0976 1.3166 20.0976 0.683436 19.7071 0.292911C19.3166 -0.0976133 18.6834 -0.0976137 18.2929 0.29291L19.7071 1.70712ZM1.70711 0.292893C1.31658 -0.0976312 0.683417 -0.0976309 0.292893 0.292894C-0.0976312 0.683418 -0.0976309 1.31658 0.292894 1.70711L1.70711 0.292893ZM18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L18.2929 19.7071ZM1.70711 19.7071L19.7071 1.70712L18.2929 0.29291L0.292894 18.2929L1.70711 19.7071ZM0.292894 1.70711L18.2929 19.7071L19.7071 18.2929L1.70711 0.292893L0.292894 1.70711Z" fill="#808080"/>
                    </svg>
                </div>
                <div class="minicart__item--container">
                    
                    <?php 
                    if(isset($_SESSION["cart_list"])){ 
                        if(count($_SESSION["cart_list"]) == 0){
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <?php    
                        } else {
                        ?>
                        <h2 class="count">Кол-во товаров: <span><?= count($_SESSION["cart_list"]); ?></span></h2>
                        <?php  
                        
                        
                        foreach($_SESSION["cart_list"] as $value){
                        ?>
                        <div class="minicart__item">
                            <div class="minicart__item--number"></div>
                            <img src="<?= $value["image"] ?>" alt="">
                            <div class="minicart__item--name"><?= $value["name"] ?></div>
                            <a href="#" class="minicart__item--remove" data-id="<?= $value["id"] ?>">
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.292894 18.2929C-0.0976309 18.6834 -0.0976312 19.3166 0.292893 19.7071C0.683417 20.0976 1.31658 20.0976 1.70711 19.7071L0.292894 18.2929ZM19.7071 1.70712C20.0976 1.3166 20.0976 0.683436 19.7071 0.292911C19.3166 -0.0976133 18.6834 -0.0976137 18.2929 0.29291L19.7071 1.70712ZM1.70711 0.292893C1.31658 -0.0976312 0.683417 -0.0976309 0.292893 0.292894C-0.0976312 0.683418 -0.0976309 1.31658 0.292894 1.70711L1.70711 0.292893ZM18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L18.2929 19.7071ZM1.70711 19.7071L19.7071 1.70712L18.2929 0.29291L0.292894 18.2929L1.70711 19.7071ZM0.292894 1.70711L18.2929 19.7071L19.7071 18.2929L1.70711 0.292893L0.292894 1.70711Z" fill="red"/>
                                </svg>
                            </a>
                        </div>
                        <?php 
                        }
                        ?>
                        <div class="minicart__order--wrapper">
                            <a href="http://localhost/delivery/order.php" class="minicart__order">Оформить заказ</a>
                        </div>
                        <?php
                        }
                        
                    } else {
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <?php
                    }  
                    ?>
                </div>
            </div>
        </div>
        <?php
         switch($_SERVER["REQUEST_URI"]){
            case "/delivery/":
                echo '<script type="module" src="js/catalog.js"></script>';
                break;
            case "/delivery/pizza.php":
                echo '<script type="module" src="js/catalog.js"></script>';
                echo '<script type="module" src="js/filter.js"></script>';
                break;
            case "/delivery/order.php":
                echo '<script type="module" src="js/order.js"></script>';
                echo '<script src="js/mask.js"></script>';
                break;
            default:
                break;
         }
         ?>
    </body>
</html>