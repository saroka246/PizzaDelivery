<?php

include_once "db.php"; 
include_once "functions.php";
session_start();

if(isset($_POST["product_id"])){
    
    $current_added_product = get_product_by_id($mysqli, $_POST["product_id"]);
    if(!isset($_SESSION["cart_list"])){
        $_SESSION["cart_list"][] = $current_added_product;
        if(isset($_SESSION["cart_list"])){ 
                        $i = 0;
                        ?>
                        <h2 class="count">Кол-во товаров: <span><?= count($_SESSION["cart_list"]); ?></span></h2>
                        <?php
                        foreach($_SESSION["cart_list"] as $value){
                            $i++;
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
                        
                    } else {
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <?php
                    }
    }
    
    $check = false;
    
    if(isset($_SESSION["cart_list"])){
        foreach($_SESSION["cart_list"] as $value){
            if($value["id"] == $current_added_product["id"]){
                $check = true;
            }
        }
        if(!$check){
            $_SESSION["cart_list"][] = $current_added_product;
            if(isset($_SESSION["cart_list"])){ 
                        $i = 0;
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
                        
                        
                    } else {
                        ?>
                        <h2>Ваша корзина пуста!</h2>
                        <?php

                    }
        }      
    }
    
    
} 
?>