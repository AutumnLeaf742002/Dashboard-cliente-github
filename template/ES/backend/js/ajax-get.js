function fun()
{
    let request = new XMLHttpRequest()
    request.open('GET', '../backend/controllers/file.php', true)
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200 )
        {
            if(request.responseText == true)
            {
                //sentences
            }
        }
    }
    request.send()
}