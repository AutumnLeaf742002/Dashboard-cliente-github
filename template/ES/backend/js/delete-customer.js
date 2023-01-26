const datos = get_target()
const datos_split = datos.split(",")
const id_cl = datos_split[0]
const id_co = datos_split[1]

const vetana_confirmacion = document.getElementById('ventana-confirmacion')
const boton_eliminar_perfil = document.getElementById("boton-eliminar-perfil")
const btn_confirm_cl = document.getElementById("btn_confirm_cl")

boton_eliminar_perfil.addEventListener("click", ()=>{

    vetana_confirmacion.style.display = "block"
    btn_confirm_cl.addEventListener("click", ()=>{
        
        let request = new XMLHttpRequest()
        request.open('POST', 'backend/php/delete-customer.php', true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                if(request.responseText == "Correct")
                {

                    aparecer_n_2("Eliminado exitosamente")
                    setTimeout(function(){

                        window.location.href = "clientes.html"
                    }, 2000)
                }
                else
                {
                    aparecer_n_3(request.responseText)
                }
            }
        }

        request.send(`id_cl=${id_cl}&id_co=${id_co}`)
        cerrar()
    })
})

function cerrar()
{
    vetana_confirmacion.style.display = "none"
}