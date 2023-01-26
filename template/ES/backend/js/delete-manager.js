const vetana_confirmacion = document.getElementById('ventana-confirmacion')
const btn_confirm_cl = document.getElementById('btn_confirm_cl')

let id_ = 0

function show()
{
    vetana_confirmacion.style.display = "block"
}
btn_confirm_cl.addEventListener("click", function(){

    if(id_ > 0)
    {
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/delete-manager.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                if(request.responseText == "Correct")
                {
                    window.location.href = "managers.html"
                }
                else
                {
                    console.log(request.responseText)
                }
            }
        }

        request.send(`id=${id_}`)
    }
})

function cerrar()
{
    vetana_confirmacion.style.display = "none"
}

function get_id(id)
{
    id_ = id
}