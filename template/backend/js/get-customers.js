const contenedor_clientes = document.getElementById('contenedor-clientes')
const contenedor_tabla_clientes = document.getElementById('contenedor-tabla-clientes')

function get_customers()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-customers.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            if(request.responseText == "none")
            {
                contenedor_tabla_clientes.innerHTML = '<h3 style="text-align: center;">No hay clientes para mostrar</h3>'
            }
            contenedor_clientes.innerHTML = request.responseText
        }
    }
    request.send()
}

get_customers()

function perfil_cliente(id_cl, id_co)
{
    window.location.href = "user-profile-customer.php?id_cl="+id_cl+"&id_co="+id_co
    
}

function get_customers_by_input()
{
    let buscador_cliente = document.getElementById('buscador-cliente')
    let select_buscador = document.getElementById('select-buscador')

    console.log('entra')
    
    if(select_buscador.value == 'todos')
    {
        get_customers()
    }
    else
    {
        if(buscador_cliente.value.length > 0)
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/get-customer-by-input.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200) {
                    contenedor_clientes.innerHTML = request.responseText
                }
            }

            request.send(`search=${buscador_cliente.value}&filtro=${select_buscador.value}`)
        }
    }
}