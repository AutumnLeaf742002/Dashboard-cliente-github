const cliente_dom = document.getElementById("cliente")
const instalador_dom = document.getElementById("instalador")
const fecha_dom = document.getElementById("fecha")
const hora_dom = document.getElementById("hora")
const tipo_instalacion_dom = document.getElementById("tipo_instalacion")
const tbody_citas = document.getElementById("tbody_citas")

function register_cita()
{
    const cliente = cliente_dom.value
    const instalador = instalador_dom.value
    const fecha = fecha_dom.value
    const hora = hora_dom.value
    const tipo_instalacion = tipo_instalacion_dom.value

    if(cliente.length > 0 && instalador.length > 0 && fecha.length > 0 && hora.length > 0 && tipo_instalacion.length > 0)
    {
        if(tipo_instalacion == "Panel Solar" || tipo_instalacion == "Filtros de Agua")
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/register-citas.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    if(request.responseText == "Correct")
                    {
                        aparecer_n_2("Successful recorded appointment")
                        get_citas()
                        
                        instalador_dom.value = ""
                        fecha_dom.value = ""
                        hora_dom.value = ""
                        tipo_instalacion_dom.value = ""
                    }
                    else if(request.responseText)
                    {
                        aparecer_n_3(request.responseText)
                    }
                }
            }

            request.send(`cliente=${cliente}&instalador=${instalador}&fecha=${fecha}&hora=${hora}&tipo_instalacion=${tipo_instalacion}`)
        }
    }
    else
    {
        aparecer_n_1("You must fill in all required fields")
    }
}

function get_citas()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/get-citas.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            tbody_citas.innerHTML = request.responseText
        }
    }

    request.send(`n=d`)
}

function cambiar_estado(event, id)
{
    const estado = event.target.value

    if(estado != "")
    {
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/cambiar-estado-cita.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                if(request.responseText == "Correct")
                {
                    get_citas()
                }
                else
                {
                    aparecer_n_3(`Unknown error: ${request.responseText}`)
                }
            }
        }

        request.send(`id=${id}&estado=${estado}`)
    }
}

get_citas()