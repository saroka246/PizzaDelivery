let filter = document.querySelector(".filter__form");
filter.addEventListener("change", function(event){
    let terms = filter.querySelectorAll(".custom-checkbox");
    let activeTerms = [];
    terms.forEach(function(elem){
        if(elem.checked)
            activeTerms.push(elem.value);
    })
    if(!activeTerms.length){
        activeTerms = "empty";
    } else {
        activeTerms = "("+activeTerms.join(",")+")";
    }
   
    fetch("http://localhost/delivery/utils/filter.php", {
        method: 'POST', 
        body: "terms="+activeTerms, 
        headers: {
            'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
        },
    })
    .then((response) => {
        return response.text();
    })
    .then((result) => {
        let container = document.querySelector(".main__wrapper .container");
        container.innerHTML = '<div class="loader__container"><h1>Загружаем пиццу...</h1><div class="loader"></div></div>';
        setTimeout(function() {
            container.innerHTML = result;
        }, 2000);
    });
})