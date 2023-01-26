const oficinas = document.getElementById('oficina')
const all_input = document.querySelectorAll(".required")

function get_oficinas()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-oficinas.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            oficinas.innerHTML = request.responseText
        }
    }
    request.send()
}

get_oficinas()

function register_manager()
{
    const nombre = document.getElementById('nombre').value
    const correo = document.getElementById('correo').value
    const celular = document.getElementById('celular').value
    const carnet = document.getElementById('carnet').value
    const oficina = oficinas.value
    const usuario = document.getElementById('usuario').value
    const clave = document.getElementById('clave').value

    if(nombre != "" && correo != "" && celular != "" && oficina != "" && usuario != "" && clave != "")
    {
        var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
        var valido = expReg.test(correo)

        if(valido == true)
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/register-manager.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {
    
                if (request.readyState == 4 && request.status == 200) {
                    if(request.responseText == "Registro completado exitosamente")
                    {
                        get_managers()
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
    
            request.send(`nombre=${nombre}&correo=${correo}&celular=${celular}&carnet=${carnet}&oficina=${oficina}&usuario=${usuario}&clave=${clave}`)
    
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