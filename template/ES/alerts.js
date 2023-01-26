// Obteniendo los elementos contenedores de las notificaciones

let btn_n_personal_1 = document.getElementById('btn-n-personal-1')
let btn_n_personal_2 = document.getElementById('btn-n-personal-2')
let btn_n_personal_3 = document.getElementById('btn-n-personal-3')

let n_personal_1 = document.getElementById('n-personal-1')
let n_personal_2 = document.getElementById('n-personal-2')
let n_personal_3 = document.getElementById('n-personal-3')

// Eventos al hacer click en el boton de la X para que desaparezca la notificacion

btn_n_personal_1.addEventListener('click', ()=>{

    n_personal_1.style.display = 'none'
    n_personal_2.style.display = 'none'
    n_personal_3.style.display = 'none'
})

btn_n_personal_2.addEventListener('click', ()=>{

    n_personal_1.style.display = 'none'
    n_personal_2.style.display = 'none'
    n_personal_3.style.display = 'none'
})

btn_n_personal_3.addEventListener('click', ()=>{

    n_personal_1.style.display = 'none'
    n_personal_2.style.display = 'none'
    n_personal_3.style.display = 'none'
})

// Funciones para hacer apacerer las notificaciones

function aparecer_n_1(aviso)
{
    let mensaje_aviso_1 = document.getElementById('mensaje-aviso-1')
    mensaje_aviso_1.innerHTML = `${aviso}`
    n_personal_1.style.display = 'block'

    n_personal_2.style.display = 'none'
    n_personal_3.style.display = 'none'
}
function aparecer_n_2(aviso)
{
    let mensaje_aviso_2 = document.getElementById('mensaje-aviso-2')
    mensaje_aviso_2.innerHTML = `${aviso}`
    n_personal_2.style.display = 'block'

    n_personal_1.style.display = 'none'
    n_personal_3.style.display = 'none'
}
function aparecer_n_3(aviso)
{
    let mensaje_aviso_3 = document.getElementById('mensaje-aviso-3')
    mensaje_aviso_3.innerHTML = `${aviso}`
    n_personal_3.style.display = 'block'

    n_personal_1.style.display = 'none'
    n_personal_2.style.display = 'none'
}