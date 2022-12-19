const contenedor_clientes = document.getElementById('contenedor-clientes')
const contenedor_tabla_clientes = document.getElementById('contenedor-tabla-clientes')

function get_customer_analist(ibwisaduiwd)
{
    let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-customer-analist.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }
        request.send(`ibwisaduiwd=${ibwisaduiwd}`)
}

get_customer_analist()

function perfil_cliente(id_cl, id_co)
{
    window.location.href = "user-profile-customer.php?id_cl="+id_cl+"&id_co="+id_co
}

const buscador_cliente = document.getElementById('buscador-cliente')
const ibwisaduiwd = document.getElementById("ibwisaduiwd")

buscador_cliente.addEventListener('keyup', () => {

    if (buscador_cliente.value.length > 0) {
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-customer-by-input.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }

        request.send(`search=${buscador_cliente.value}`)
    }
    else {
        get_customers()
    }
})

