let e_analist = document.querySelectorAll(".r_analist")
let e_manager = document.querySelectorAll(".r_manager")
let e_administrator = document.querySelectorAll(".r_administrator")

function remove_element()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/remove-element.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            if(request.responseText == "1")
            {
                
                e_administrator.forEach(function(item){

                    item.remove()
                })
            }
            if(request.responseText == "2")
            {
                e_manager.forEach(function(item){

                    item.remove()
                })
            }
            if(request.responseText == "3")
            {
                e_analist.forEach(function(item){

                    item.remove()
                })
            }
        }
    }

    request.send(`n=d`)
}

remove_element()