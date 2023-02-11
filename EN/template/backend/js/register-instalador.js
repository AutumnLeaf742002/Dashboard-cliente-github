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
                    aparecer_n_2("Successfully registered")
                    name_dom.value = ""
                    cell_dom.value = ""
                    office_dom.value = ""

                    get_instaladores()
                }
                else if(request.responseText.includes("for key 'Cell'"))
                {
                    aparecer_n_3("This Cell Phone already exists")
                }
                else
                {
                    alert(request.responseText)
                }
            }
            else
            {
                aparecer_n_1("You must fill in all fields")
            }
        }
    }

    request.send(`name=${name}&cell=${cell}&office=${office}`)
}