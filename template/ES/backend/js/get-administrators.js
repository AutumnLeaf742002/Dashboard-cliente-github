const list_managers = document.getElementById('list-administrators')

function get_administrators()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-administrators.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            list_managers.innerHTML = request.responseText
        }
    }
    request.send()
}

get_administrators()