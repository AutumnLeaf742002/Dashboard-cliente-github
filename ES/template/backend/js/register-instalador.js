name_dom = document.getElementById("name")
cell_dom = document.getElementById("cell")
office_dom = document.getElementById("office")

function register_instalador()
{
    const name = name_dom.value
    const cell = cell_dom.value
    const office = office_dom.value

    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/register-instalador.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            if(name.length > 0 && cell.length > 0 && office.length > 0 )
            {
                if(request.responseText == "Correct")
                {
                    aparecer_n_2("Registrado con exito")
                    name_dom.value = ""
                    cell_dom.value = ""
                    office_dom.value = ""

                    get_instaladores()
                }
                else if(request.responseText.includes("for key 'Cell'"))
                {
                    aparecer_n_3("Este Celular ya existe")
                }
                else
                {
                    alert(request.responseText)
                }
            }
            else
            {
                aparecer_n_1("Debe rellenar todos los campos")
            }
        }
    }

    request.send(`name=${name}&cell=${cell}&office=${office}`)
}