const vetana_confirmacion = document.getElementById('ventana-confirmacion')
const btn_confirm_cl = document.getElementById('btn_confirm_cl')
const btn_edit = document.getElementById('btn-edit')

const name_dom = document.getElementById('name')
const mail_dom = document.getElementById('mail')
const cell_dom = document.getElementById('cell')
const carnet_dom = document.getElementById('carnet')
const comision_dom = document.getElementById('comision')
const start_date_dom = document.getElementById('start_date')
const recruiter_dom = document.getElementById('recruiter')
const user_dom = document.getElementById('user')
let id_a = 0

btn_edit.addEventListener('click', function(){

    vetana_confirmacion.style.display = "block"
})

btn_confirm_cl.addEventListener('click', function(){

    const name = name_dom.value
    const mail = mail_dom.value
    const cell = cell_dom.value
    const carnet = carnet_dom.value
    const comision = comision_dom.value
    const start_date = start_date_dom.value
    const recruiter = recruiter_dom.value
    const user = user_dom.value

    if(name.length > 0 && mail.length > 0 && cell.length > 0 && start_date.length > 0 && user.length > 0)
    {
        if(id_a > 0)
        {
            let request = new XMLHttpRequest()
            request.open('POST', 'backend/php/edit-analist.php', true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.onreadystatechange = function () {
    
                if (request.readyState == 4 && request.status == 200) {
                    
                    let res = request.responseText
                    if(res == "Correct")
                    {
                        aparecer_n_2("Cambios guardados")
                        cerrar()

                        setTimeout(re, 3000)
                    }
                    else if(res.includes("for key 'Mail_2'"))
                    {
                        aparecer_n_3("Este Correo ya existe")
                        cerrar()
                    }
                    else if(res.includes("for key 'Cell'"))
                    {
                        aparecer_n_3("Este Celular ya existe")
                        cerrar()
                    }
                    else if(res.includes("for key 'Carnet'"))
                    {
                        aparecer_n_3("Este Carnet ya existe")
                        cerrar()
                    }
                    else if(res.includes("for key 'User'"))
                    {
                        aparecer_n_3("Este Usuario ya existe")
                        cerrar()
                    }
                    else if(res == "mf")
                    {
                        aparecer_n_3("Correo invalido")
                        cerrar()
                    }
                    else
                    {
                        console.log(res)
                        cerrar()
                    }
                }
            }
    
            request.send(`id_a=${id_a}&name=${name}&mail=${mail}&cell=${cell}&carnet=${carnet}&comision=${comision}&start_date=${start_date}&recruiter=${recruiter}&user=${user}&`)    
        }
    }
    else
    {
        aparecer_n_1("Debe todos rellenar los campos obligatorios")
        cerrar()
    }
})

function cerrar()
{
    vetana_confirmacion.style.display = "none"
}

function set_id(id)
{
    id_a = id
}

function re()
{
    window.location.href = `user-profile-analyst.php?vmekmsi23xmfvwe155=${id_a}`
}