const id_cliente_dom = document.getElementById("id_cliente")
const nombre_plomero_dom = document.getElementById("nombre_plomero")
const apellido_plomero_dom = document.getElementById("apellido_plomero")
const cell_plomero_dom = document.getElementById("cell_plomero")
const fecha_dom = document.getElementById("fecha")
const hora_dom = document.getElementById("hora")
const direccion_dom = document.getElementById("direccion")
const tipo_instalacion_dom = document.getElementById("tipo_instalacion")
const tbody_citas = document.getElementById("tbody_citas")

function register_cita()
{
    const id_cliente = id_cliente_dom.value
    const nombre_plomero = nombre_plomero_dom.value
    const apellido_plomero = apellido_plomero_dom.value
    const cell_plomero = cell_plomero_dom.value
    const fecha = fecha_dom.value
    const hora = hora_dom.value
    const direccion = direccion_dom.value
    const tipo_instalacion = tipo_instalacion_dom.value

    if(id_cliente.length > 0 && nombre_plomero.length > 0 && apellido_plomero.length > 0 && cell_plomero.length > 0 && fecha.length > 0 && hora.length > 0 && direccion.length > 0 && tipo_instalacion.length > 0)
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
                        aparecer_n_2("Cita registrada con exito")
                        get_citas()
                        
                        id_cliente_dom.value = ""
                        nombre_plomero_dom.value = ""
                        apellido_plomero_dom.value = ""
                        cell_plomero_dom.value = ""
                        fecha_dom.value = ""
                        hora_dom.value = ""
                        direccion_dom.value = ""
                        tipo_instalacion_dom.value = ""
                    }
                    else if(request.responseText)
                    {
                        aparecer_n_3(request.responseText)
                    }
                }
            }

            request.send(`id_cliente=${id_cliente}&nombre_plomero=${nombre_plomero}&apellido_plomero=${apellido_plomero}&cell_plomero=${cell_plomero}&fecha=${fecha}&hora=${hora}&direccion=${direccion}&tipo_instalacion=${tipo_instalacion}`)
        }
    }
    else
    {
        aparecer_n_1("Debe llenar todos los campos obligatorios")
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

get_citas()