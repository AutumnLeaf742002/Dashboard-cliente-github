const all_input = document.querySelectorAll(".required")

function register_administrator()
{
    const nombre = document.getElementById('nombre').value
    const correo = document.getElementById('correo').value
    const celular = document.getElementById('celular').value
    const carnet = document.getElementById('carnet').value
    const usuario = document.getElementById('usuario').value
    const clave = document.getElementById('clave').value

    if(nombre != "" && correo != "" && celular != "" && usuario != "" && clave != "")
    {
        var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
        var valido = expReg.test(correo)

        if(valido == true)
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/register-administrator.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {
    
                if (request.readyState == 4 && request.status == 200) {
                    if(request.responseText == "Registro completado exitosamente")
                    {
                        get_administrators()
                        aparecer_n_2(request.responseText)
                        const DOM_carnet = document.getElementById("carnet")
                        DOM_carnet.value = ""
                        all_input.forEach(function(item){

                            item.value = ""
                        })
                    }
                    else
                    {
                        aparecer_n_3(request.responseText)
                    }
                }
            }
    
            request.send(`nombre=${nombre}&correo=${correo}&celular=${celular}&carnet=${carnet}&usuario=${usuario}&clave=${clave}`)
    
        }
        else
        {
            const DOM_correo = document.getElementById("correo")
            DOM_correo.style.border = "1px solid red"
            aparecer_n_1("Correo invalido: Asegurate que el correo sea valido o no tenga mayúsculas ni espacios de mas")
        } 
    }
    else
    {
        aparecer_n_1("Debe rellenar los campos obligarios")
        all_input.forEach(function(item){

            if(item.value.length < 1)
            {
                item.style.border = "1px solid red"
            }
        })
    }
}

all_input.forEach(function(item){

    item.addEventListener("click", ()=>{

        item.style.border = "1px solid #d9d9d9"
    })
})