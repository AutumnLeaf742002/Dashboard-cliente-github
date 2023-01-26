const list_analist = document.getElementById('list-analist')

function get_analist()
{
    let request = new XMLHttpRequest()
    request.open('GET', 'backend/php/get-analist.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            list_analist.innerHTML = request.responseText
        }
    }
    request.send()
}

get_analist()

const tittle_error = document.getElementById("tittle-error")
const text_error = document.getElementById("text-error")
const notifi = document.getElementById("notifi")

function close_notifi()
{
    notifi.setAttribute('style', 'display: none !important; position: relative; background-color: rgb(241, 31, 31);')
}

function open_notifi(tittle, text)
{
    notifi.setAttribute('style', 'display: block !important; position: relative; background-color: rgb(241, 31, 31);')
    text_error.innerHTML = text
    tittle_error.innerHTML = tittle
}

const notifi2 = document.getElementById("notifi2")

function close_notifi2()
{
    notifi2.setAttribute('style', 'display: none !important; position: relative; background-color: rgb(0, 177, 0);')
}

function open_notifi2()
{
    notifi2.setAttribute('style', 'display: block !important; position: relative; background-color: rgb(0, 177, 0);')
}