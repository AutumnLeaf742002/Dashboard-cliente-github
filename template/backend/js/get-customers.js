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