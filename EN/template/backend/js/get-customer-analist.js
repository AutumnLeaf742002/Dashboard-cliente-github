const contenedor_clientes = document.getElementById('contenedor-clientes')
const contenedor_tabla_clientes = document.getElementById('contenedor-tabla-clientes')
const sss = document.getElementById("ibwisaduiwd")

function get_customer_analist()
{
    let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-customer-analist.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }
        request.send(`ibwisaduiwd=${sss.textContent}`)
}

get_customer_analist()

function perfil_cliente(id_cl, id_co)
{
    window.location.href = "user-profile-customer.php?id_cl="+id_cl+"&id_co="+id_co
}

const buscador_cliente = document.getElementById('buscador-cliente')

buscador_cliente.addEventListener('keyup', () => {

    if (buscador_cliente.value.length > 0) {
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-customer-analist-by-input.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }

        request.send(`search=${buscador_cliente.value}&ibwisaduiwd=${sss.textContent}`)
    }
    else {
        get_customer_analist()
    }
})

function agendar_cita(id)
{
    window.location.href = `citas.php?cl=${id}`
}