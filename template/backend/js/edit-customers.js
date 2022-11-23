const vetana_confirmacion = document.getElementById('ventana-confirmacion')
const btn_confirm_cl = document.getElementById('btn_confirm_cl')

let request = new XMLHttpRequest()

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

                url: "backend/php/edit-customers.php",
                type: "POST",
                data: datos,
                contentType: false,
                processData: false,
                success: function (datos) {
                    const sql = datos
                    vetana_confirmacion.style.display = "block"

                    btn_confirm_cl.addEventListener("click", ()=>{

                        request.open('POST', 'backend/php/edit-customer-finally.php', true)
                        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                        request.onreadystatechange = function () {

                            if (request.readyState == 4 && request.status == 200) {

                                let res = request.responseText
                                if(res == "Correct")
                                {
                                    aparecer_n_2("Cambios guardados")
                                    cerrar()

                                    setTimeout(function(){

                                        done()
                                    },2000)
                                }
                                else if(res.includes("for key 'N_seguro_social'") == true)
                                {
                                    aparecer_n_3("El Seguro Social ya se esta utilizando en un cliente")
                                    cerrar()
                                }
                                else if(res.includes("for key 'N_licencia_conducir'") == true)
                                {
                                    aparecer_n_3("La Licencia de Conducir ya se esta utilizando en un cliente")
                                    cerrar()
                                }
                                else if(res.includes("for key 'Telefono_celular'") == true)
                                {
                                    aparecer_n_3("El Numero de Celular ya se esta utilizando en un cliente")
                                    cerrar()
                                }
                                else if(res.includes("for key 'Correo'") == true)
                                {
                                    aparecer_n_3("El Correo ya se esta utilizando en un cliente")
                                    cerrar()
                                }
                                else
                                {
                                    aparecer_n_3(`Error desconocido: ${res}`)
                                    cerrar()
                                }
                            }
                        }

                        request.send(`sql=${sql}`)
                    })
                }
            })
        }
        else
        {
            aparecer_n_1("Correo invalido")
        }
    }
} 

function cerrar()
{
    vetana_confirmacion.style.display = "none"
}