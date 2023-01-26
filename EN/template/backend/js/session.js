function session()
{

    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/session.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            
            if(request.responseText == "False")
            {
                window.location.href = "login.html"
            }
        }
    }

    request.send("u=true")
}

session()