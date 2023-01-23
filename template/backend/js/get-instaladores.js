function get_instaladores()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/get-instaladores.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            alert(request.responseText)
        }
    }

    request.send(`n=d`)
}

get_instaladores()