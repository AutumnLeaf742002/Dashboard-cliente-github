const oficinas = document.getElementById('oficinas')
const managers = document.getElementById('managers')

function get_oficinas()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-oficinas.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            oficinas.innerHTML = request.responseText
        }
    }
    request.send()
}
function get_managers()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-managers.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            managers.innerHTML = request.responseText
        }
    }
    request.send()
}

get_oficinas()
get_managers()

$(document).ready()
{
    $("#form-data").submit(ajax)

    function ajax(event)
    {
        event.preventDefault()
        var datos = new FormData($("#form-data")[0])

        $.ajax({

            url: "backend/php/register-analist.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function(datos){
                if(datos == "Registro completado exitosamente")
                {
                    open_notifi2()
                    get_analist()

                    const list_input = document.querySelectorAll('.form-control')

                    list_input.forEach(item =>{

                        item.value = ""
                    })
                }
                else
                {
                    open_notifi(`<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mx-2 text-warning bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                    <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>Error`, datos)
                }
            }
        })
    }
} 