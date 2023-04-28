import { removeProduct } from "./removeProduct.js";

export function orderRemove(result){
    if(result != 0){
        document.querySelector(".minicart__item--container h2.count span").innerHTML = result;
        document.querySelector(".order__wrapper h2.count span").innerHTML = result;
        changeTotal();
    } else {
        document.querySelector(".order__wrapper .container").innerHTML = '<h2>Ваша корзина пуста!</h2><div class="minicart__order--wrapper"><a href="http://localhost/delivery/pizza.php" class="minicart__order">Перейти к покупкам</a></div>';
    }
}
function changeTotal(){
    let fullPrice = 0.0;
    document.querySelectorAll(".order__wrapper .minicart__item").forEach( elem => {
        fullPrice = parseFloat(fullPrice) + parseFloat(elem.querySelector('.minicart__item--price').value);
    });
    document.querySelector("h2.price span").innerHTML = fullPrice;
}
if(document.URL.includes("order.php")){
    document.querySelector(".header__btn.cart").classList.add("disabled");
    document.querySelector(".header__btn.cart span").remove();
    
    let formEvents = document.querySelector('.order__form');
    formEvents.addEventListener("click",function(event){
        let elem = event.target;
        if(elem.closest(".minicart__item--remove")){
            removeProduct(elem.closest(".minicart__item--remove"));
        }
        if(elem.closest('.number button')){
            let row = elem.closest('.number');
            let input = row.querySelector('input[type="text"]');
            let e = new Event("change");
            let val = parseFloat(input.value);
            if (elem.classList.contains('number-minus')) {
                val--;
            } else {
                val++;
            }
            input.value = val;
            input.dispatchEvent(e);
            let price =  elem.closest(".minicart__item").querySelector(".minicart__item--name").getAttribute("data-price"); 
            var quantity = elem.closest(".minicart__item").querySelector('.minicart__item--quantity').value;  
            elem.closest(".minicart__item").querySelector('.minicart__item--price').value = parseFloat(price)*parseFloat(quantity);
            changeTotal();
        }
    });
    let inputs = document.querySelectorAll('.number input[type="text"]');
    inputs.forEach(elem => {
        elem.addEventListener("change", function(event){
            let input = event.target;
            let row = input.closest('.number');
            let step = row.getAttribute('data-step');
            let min = parseInt(row.getAttribute('data-min'));
            let max = parseInt(row.getAttribute('data-max'));
            let val = parseFloat(input.value);
            if (isNaN(val)) {
                val = step;
            } else if (min && val < min) {
                val = min;	
            } else if (max && val > max) {
                val = max;	
            }
            input.value = val;
        })
    })
    

    let form = document.querySelector(".order__form");
    form.addEventListener("submit", function(event){
        event.preventDefault();
        let name = this.querySelector('input[name="name"]').value;
        let phone = this.querySelector('input[name="phone"]').value;
        let address = this.querySelector('input[name="address"]').value;
        let details = "";
        let price = this.querySelector('h2.price span').innerHTML;
        document.querySelectorAll(".order__form .minicart__item").forEach(function(elem, index){
            details+= index+1 + ")"; 
            details+=" ";
            details+= elem.querySelector(".minicart__item--name").innerHTML;
            details+=" ";
            details+= elem.querySelector('.minicart__item--quantity').value;
            details+=" шт; ";
        });
        fetch("http://localhost/delivery/utils/ordering.php", {
            method: 'POST', 
            body:('param=' +  JSON.stringify({
                name: name,
                phone: phone,
                address: address,
                details: details,
                price: price,
            })), 
            headers: {
                'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
            },
        })
        .then((response) => {
            return response.text();
        })
        .then((result) => {
            if(result == "success"){  
                document.querySelector(".order__wrapper .container").innerHTML = '<h2>Ваш заказ принят!</h2><div class="minicart__order--wrapper"><a href="http://localhost/delivery/pizza.php" class="minicart__order">Перейти к покупкам</a></div>';
            } 
        });
    });
} 
