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
                    console.log(datos)
                }
            })
        }
        else
        {
            // aparecer_n_1("Correo invalido")
            alert("el correo no es valido")
        }
    }
} 