const userDOM = document.getElementById("user")
const passDOM = document.getElementById("pass")
const rolDOM = document.getElementById("rol")

function set_session()
{   
    const user = userDOM.value
    const pass = passDOM.value
    const rol = rolDOM.value

    if(user.length > 0 &&  pass.length > 0)
    {
        if(rol == 1 || rol == 2 || rol == 3)
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/set-session.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    if(request.responseText == "True")
                    {
                        cerrar()
                        window.location.href = "clientes.html"
                    }
                    else
                    {
                        aparecer()
                    }
                }
            }

            request.send(`user=${user}&pass=${pass}&rol=${rol}`)
        }
        
    }
    
}

const container_alert = document.querySelector(".container_alert")
function aparecer()
{
    container_alert.style.display = "block"
}

function cerrar()
{
    container_alert.style.display = "none"
}

window.addEventListener('keydown', function(event) {
    if (event.keyCode === 13)
    {
        set_session()
    }
});