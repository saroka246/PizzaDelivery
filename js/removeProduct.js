import { orderRemove } from "./order.js";

export function removeProduct(elem){
    let delete_id = elem.getAttribute('data-id');
    if(elem.classList.contains("card__btn")){
        elem.classList.remove("active");
        elem.innerHTML = "В корзину";
        document.querySelector('.minicart__item--remove[data-id="'+delete_id+'"]').closest(".minicart__item").remove();
    } else {
        let card_elem = document.querySelector('.card__btn[data-id="'+delete_id+'"]');
        if(card_elem){
            card_elem.classList.remove("active");
            card_elem.innerHTML = "В корзину";
        }
        elem.closest(".minicart__item").remove();
    }
    fetch("http://localhost/delivery/utils/cart_remove.php", {
        method: 'POST', 
        body: "delete_id="+delete_id, 
        headers: {
            'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
        },
        })
        .then((response) => {
            return response.text();
        })
        .then((result) => {
            if(document.URL.includes("order.php")){
                orderRemove(result);
            } else {
                document.querySelector(".header__btn.cart span").innerHTML = result;
                if(result != 0){
                    document.querySelector(".minicart__item--container h2.count span").innerHTML = result;
                } else {
                    document.querySelector(".minicart__item--container").innerHTML = '<h2>Ваша корзина пуста!</h2>';
                }
            }
        });
}
