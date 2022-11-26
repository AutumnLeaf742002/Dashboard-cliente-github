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
                    if (datos == "Registro completado exitosamente") {
                        aparecer_n_2("Registro completado exitosamente")

                        const list_input = document.querySelectorAll('.form-control')
                        get_analist()

                        list_input.forEach(item => {

                            item.value = ""
                        })
                    }
                    else {
                        aparecer_n_3(datos)
                    }
                }
            })
    }
} 