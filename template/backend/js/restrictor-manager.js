function get_rol()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/restrictor.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            if(request.responseText == 2)
            {
                window.location.href = "resctric.html"
            }
        }
    }

    request.send("n=d")
}

get_rol()