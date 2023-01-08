let c_m = document.querySelectorAll(".c-m")

function get_rol()
{

    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/empty.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            if(request.responseText == "2")
            {
                
                c_m.forEach(function(item){
                    
                    item.textContent = ""

                })
            }
        }
    }

    request.send("n=d")
}

get_rol()