const vetana_confirmacion_co = document.getElementById('ventana-confirmacion_co')
const btn_confirm_co = document.getElementById('btn_confirm_co')

$(document).ready()
{
    $("#form-data-co").submit(ajax)

    function ajax(event)
    {
        const correo_co = document.getElementById('correo_co')
        var expReg_co = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
        var valido_co = expReg_co.test(correo_co.value)

        event.preventDefault()
        var datos = new FormData($("#form-data-co")[0])

        if (valido_co == true) 
        {

            $.ajax({

                url: "backend/php/edit-co_aplicant.php",
                type: "POST",
                data: datos,
                contentType: false,
                processData: false,
                success: function (datos) {
                    const sql_co = datos
                    vetana_confirmacion_co.style.display = "block"

                    btn_confirm_co.addEventListener("click", ()=>{

                        let request = new XMLHttpRequest()
                        request.open('POST', 'backend/php/edit-co_aplicant-finally.php', true)
                        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                        request.onreadystatechange = function () {

                            if (request.readyState == 4 && request.status == 200) {

                                let res = request.responseText
                                if(res == "Correct")
                                {
                                    aparecer_n_2("Cambios del co aplicante guardados")
                                    cerrar_co()

                                    setTimeout(function(){

                                        done()
                                    },2000)
                                }
                                else if(res.includes("for key 'C_N_seguro_social'") == true)
                                {
                                    aparecer_n_3("El Seguro Social ya se esta utilizando en un co aplicante")
                                    cerrar_co()
                                }
                                else if(res.includes("for key 'C_N_licencia_conducir'") == true)
                                {
                                    aparecer_n_3("La Licencia de Conducir ya se esta utilizando en un co aplicante")
                                    cerrar_co()
                                }
                                else if(res.includes("for key 'C_Telefono_celular'") == true)
                                {
                                    aparecer_n_3("El Numero de Celular ya se esta utilizando en un co aplicante")
                                    cerrar_co()
                                }
                                else if(res.includes("for key 'C_Correo'") == true)
                                {
                                    aparecer_n_3("El Correo ya se esta utilizando en un co aplicante")
                                    cerrar_co()
                                }
                                else
                                {
                                    aparecer_n_3(`Error desconocido: ${res}`)
                                    cerrar_co()
                                }
                            }
                        }

                        request.send(`sql=${sql_co}`)
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

function cerrar_co()
{
    vetana_confirmacion_co.style.display = "none"
}