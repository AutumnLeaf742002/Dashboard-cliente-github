const list_managers = document.getElementById('list-managers')

function get_managers()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-managers-mg.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            list_managers.innerHTML = request.responseText
        }
    }
    request.send()
}

get_managers()