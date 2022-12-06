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
        const correo = document.getElementById('correo')
        var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
        var valido = expReg.test(correo.value)

        event.preventDefault()
        var datos = new FormData($("#form-data")[0])

        if (valido == true) 
        {

            $.ajax({

                url: "backend/php/register-analist.php",
                type: "POST",
                data: datos,
                contentType: false,
                processData: false,
                success: function (datos) {
                    if (datos == "Registro completado exitosamente") {
                        aparecer_n_2("Registro completado exitosamente")

                        const list_input = document.querySelectorAll('.form-control')
                        get_analist()

                        list_input.forEach(item => {

                            item.value = ""
                        })
                    }
                    else {
                        aparecer_n_3(datos)
                    }
                }
            })
        }
        else
        {
            aparecer_n_1("Correo invalido: Asegurate que el correo sea valido o no tenga mayúsculas ni espacios de mas")
        }
    }
} 

function refresh()
{
    get_analist()
}