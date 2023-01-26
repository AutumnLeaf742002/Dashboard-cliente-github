const contenedor_clientes = document.getElementById('contenedor-clientes')
const contenedor_tabla_clientes = document.getElementById('contenedor-tabla-clientes')
const sss = document.getElementById("niiibdsw")

function get_analist_for_profile_manager()
{
    let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-analist-for-profile-manager.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }
        request.send(`vmekmsi23xmfvwe155=${sss.textContent}`)
}

get_analist_for_profile_manager()

function perfil_analist(id)
{
    window.location.href = `user-profile-analyst.php?vmekmsi23xmfvwe155=${id}`
}

const buscador_cliente = document.getElementById('buscador-cliente')

buscador_cliente.addEventListener('keyup', () => {

    if (buscador_cliente.value.length > 0) {
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/get-analist-for-profile-manager-by-input.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                contenedor_clientes.innerHTML = request.responseText
            }
        }

        request.send(`search=${buscador_cliente.value}&vmekmsi23xmfvwe155=${sss.textContent}`)
    }
    else {
        get_analist_for_profile_manager()
    }
})

