$(document).ready()
{
    $("#form-data").submit(ajax)

    function ajax(event)
    {
        event.preventDefault()
        var datos = new FormData($("#form-data")[0])

            $.ajax({

                url: "backend/php/set-session.php",
                type: "POST",
                data: datos,
                contentType: false,
                processData: false,
                success: function (datos) {
                    if (datos == "true")
                    {

                    }
                    else
                    {
                        aparecer_n_3(datos)
                    }
                }
            })
    }
} 