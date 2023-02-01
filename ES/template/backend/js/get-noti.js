const set_number = document.getElementById('set-number')
const container_noti = document.getElementById('container-noti')

function get_noti()
{

    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/get-noti.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            let array_return = request.responseText.split("--")

            set_number.innerHTML = array_return[1]
            container_noti.innerHTML = array_return[0]
        }
    }

    request.send(`n=d`)
}

function go_perfil(id, id_co)
{
    window.location.href = `user-profile-customer.php?id_cl=${id}&id_co=${id_co}`
}

get_noti()