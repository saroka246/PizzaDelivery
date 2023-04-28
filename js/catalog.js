import { removeProduct } from "./removeProduct.js";

let cartBtnEnabled = document.querySelector(".header__btn.cart:not(.disabled)");
let minicartWrapper = document.querySelector(".minicart__wrapper");
cartBtnEnabled.addEventListener("click", function(){
    minicartWrapper.classList.add("active");
})
minicartWrapper.addEventListener("click",function(event){
    if(minicartWrapper.classList.contains("active")){
        if (event.target.closest('.minicart__container')) {
            if (event.target.closest(".close__btn")) {
                minicartWrapper.classList.remove("active");
            }
            if(event.target.closest(".minicart__item--remove")){
                removeProduct(event.target.closest(".minicart__item--remove"));
            }
        } else {
            minicartWrapper.classList.remove("active");
        }
    }
})

let cardBtns = document.querySelector('.main__wrapper .container');
cardBtns.addEventListener("mouseover",function(event){
    let elem = event.target;
    if(elem.classList.contains("card__btn")){
        if(elem.classList.contains("active")){
            elem.innerHTML = "Удалить";
        }
    }
});
cardBtns.addEventListener("mouseout",function(event){
    let elem = event.target;
    if(elem.classList.contains("card__btn")){
        if(elem.classList.contains("active")){
            elem.innerHTML = "Добавлено";
        }
    }
});
cardBtns.addEventListener("click", event => {
    let elem = event.target;
    event.preventDefault();
    if(elem.classList.contains("card__btn")){
        if(!elem.classList.contains("active")){
            elem.classList.add("active");
            elem.innerHTML = "Добавлено";
            fetch("http://localhost/delivery/utils/cart_functions.php", {
                method: 'POST', 
                body: "product_id="+elem.getAttribute('data-id'), 
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
                },
            })
            .then((response) => {
                return response.text();
            })
            .then((result) => {
                document.querySelector(".minicart__item--container").innerHTML = result;
                document.querySelector(".header__btn.cart span").innerHTML = document.querySelector(".minicart__item--container .count span").innerHTML;
            });
        } else {
            removeProduct(elem);
        }
        
    }
});