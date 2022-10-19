function add_administrator()
{

    let request = new XMLHttpRequest()
    request.open('POST', 'backend/php/register-administrators.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            console.log(request.responseText)
        }
    }

    request.send(`name=${name_administrator.value}`)
}