const list_instaladores = document.getElementById("list-instaladores")

function get_instaladores()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/get-instaladores.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            list_instaladores.innerHTML = request.responseText
        }
    }

    request.send(`n=d`)
}

get_instaladores()