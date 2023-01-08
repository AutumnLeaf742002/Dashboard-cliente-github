const label = document.querySelectorAll(".lbl")
const form_control = document.querySelectorAll(".form-control")

form_control.forEach(function(item){

    item.addEventListener("focus", function(){

        label.forEach(function(item2){

            item2.style.top = "0%"
            item2.style.padding = "0px 5px"
            item2.style.color = "#2196f3"
            item2.style.fontSize = "14px"
        })
    })
})

form_control.forEach(function(item){

    item.addEventListener("blur", function(){

        if(item.value.length <= 0)
        {
            label.forEach(function(item2){

                item2.style.top = "50%"
                item2.style.padding = "0px"
                item2.style.color = "#a39a96"
                item2.style.fontSize = "14px"
            })
        }
    })
})