function co_aplicante_true(count_co)
{
    if(count_co < 1)
    {
        const card = document.querySelector('.card_co')

        card.innerHTML = '<h1 style="width: 100%; text-align:center;">Este cliente no cuenta con co aplicante</h1>'
    }
}