const vetana_confirmacion = document.getElementById('ventana-confirmacion')
let sql = ''

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
                    sql = datos
                    vetana_confirmacion.innerHTML = `
                    <!-- sweet alert framework -->
                    <link rel="stylesheet" type="text/css" href="../bower_components/sweetalert/css/sweetalert.css">
                    <!-- Style.css -->
                    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
                    <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true" data-animation="pop" data-timer="null" style="display: block; margin-top: -169px;"><div class="sa-icon sa-error" style="display: none;">
                        <span   span class="sa-x-mark">
                            <span class="sa-line sa-left"></span>
                        <span class="sa-line sa-right"></span>
                    </span>
                    </div><div class="sa-icon sa-warning pulseWarning" style="display: block;">
                    <span class="sa-body pulseWarningIns"></span>
                    <span class="sa-dot pulseWarningIns"></span>
                    </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
                    <span class="sa-line sa-tip"></span>
                    <span class="sa-line sa-long"></span>
                    
                    <div class="sa-placeholder"></div>
                    <div class="sa-fix"></div>
                    </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>¿Deseas guardar los cambios?</h2>
                    <p style="display: block;">Si haces click en aceptar se guardaran los cambios realizados.</p>
                    <fieldset>
                    <input type="text" tabindex="3" placeholder="">
                    <div class="sa-input-error"></div>
                    </fieldset><div class="sa-error-container">
                    <div class="icon">!</div>
                    <p>You need to write something!</p>
                    </div><div class="sa-button-container">
                    <button onclick="cerrar()" class="cancel" tabindex="2" style="display: inline-block; box-shadow: none;">Cancelar</button>
                    <div class="sa-confirm-button-container">
                    <button onclick="edit_finally()" class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Aceptar</button><div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
                    </div>
                    </div>
                    </div></div>
                    `








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
    vetana_confirmacion.innerHTML = " "
}

function edit_finally()
{
    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/edit-customer-finally.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            let res = request.responseText
            if(res == "Correct")
            {
                aparecer_n_2("Cambios guardados")
                cerrar()
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
}