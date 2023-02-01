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

            if(array_return[1] != " 0")
            {
                set_number.innerHTML = array_return[1]
                container_noti.innerHTML = array_return[0]
            }
            else
            {
                const a_number = document.getElementById('a-number')
                a_number.innerHTML = `
                <i class="ti-bell"></i>
                <span style="background-color: #2ecc71 !important;" id="set-number" class="badge">0</span>
                `
            }

        }
    }

    request.send(`n=d`)
}

function go_perfil(id, id_co)
{
    window.location.href = `user-profile-customer.php?id_cl=${id}&id_co=${id_co}`
}

get_noti()