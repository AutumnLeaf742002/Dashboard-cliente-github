let avatar_invalid = document.querySelector('.avatar_invalid')

// Avatars

let a_1 = document.getElementById('a-1')
let a_2 = document.getElementById('a-2')
let a_3 = document.getElementById('a-3')
let a_4 = document.getElementById('a-4')
let a_5 = document.getElementById('a-5')
let a_6 = document.getElementById('a-6')
let a_7 = document.getElementById('a-7')
let a_8 = document.getElementById('a-8')

var avatar_selected = 0

//incio seleccion de avatar

a_1.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_1.style.border = '2px solid #0073AA'

    avatar_selected = 1
})

a_2.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_2.style.border = '2px solid #0073AA'

    avatar_selected = 2
})

a_3.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_3.style.border = '2px solid #0073AA'

    avatar_selected = 3
})

a_4.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_4.style.border = '2px solid #0073AA'

    avatar_selected = 4
})

a_5.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_5.style.border = '2px solid #0073AA'

    avatar_selected = 5
})

a_6.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_6.style.border = '2px solid #0073AA'

    avatar_selected = 6
})

a_7.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_7.style.border = '2px solid #0073AA'

    avatar_selected = 7
})

a_8.addEventListener('click', () => {

    
    a_1.style.border = 'none'
    a_2.style.border = 'none'
    a_3.style.border = 'none'
    a_4.style.border = 'none'
    a_5.style.border = 'none'
    a_6.style.border = 'none'
    a_7.style.border = 'none'
    a_8.style.border = 'none'

    a_8.style.border = '2px solid #0073AA'

    avatar_selected = 8
})

//fin seleccion de avatar



// Inicio de obtencion de los campos

    // Obtencion de los campos del cliente (cl_)
    let cl_cantidad_financiada = document.getElementById('cl_cantidad_financiada')
    let cl_nombre_representante = document.getElementById('cl_nombre_representante')
    
    let cl_1 = document.getElementById('cl_1')
    let cl_2 = document.getElementById('cl_2')
    let cl_3 = document.getElementById('cl_3')
    let cl_4 = document.getElementById('cl_4')
    let cl_5 = document.getElementById('cl_5') //opcional
    let cl_6 = document.getElementById('cl_6')
    let cl_8 = document.getElementById('cl_8')
    let cl_9 = document.getElementById('cl_9')
    let cl_10 = document.getElementById('cl_10')

    let cl_11 = document.getElementById('cl_11')
    let cl_12 = document.getElementById('cl_12')
    let cl_13 = document.getElementById('cl_13')
    let cl_14 = document.getElementById('cl_14') //opcional
    let cl_15 = document.getElementById('cl_15')
    let cl_16 = document.getElementById('cl_16') //opcional
    let cl_17 = document.getElementById('cl_17') //opcional
    let cl_18 = document.getElementById('cl_18') //opcional
    let cl_19 = document.getElementById('cl_19') //opcional
    let cl_20 = document.getElementById('cl_20')

    let cl_21 = document.getElementById('cl_21')
    let cl_22 = document.getElementById('cl_22')
    let cl_23 = document.getElementById('cl_23')
    let cl_24 = document.getElementById('cl_24')
    let cl_25 = document.getElementById('cl_25')
    let cl_26 = document.getElementById('cl_26')
    let cl_27 = document.getElementById('cl_27')
    let cl_28 = document.getElementById('cl_28') //opcional
    let cl_29 = document.getElementById('cl_29')
    let cl_30 = document.getElementById('cl_30')

    let cl_31 = document.getElementById('cl_31')
    let cl_32 = document.getElementById('cl_32')
    let cl_33 = document.getElementById('cl_33') //opcional
    let cl_34 = document.getElementById('cl_34') //opcional
    let cl_35 = document.getElementById('cl_35') //opcional
    let cl_36 = document.getElementById('cl_36') //opcional
    let cl_37 = document.getElementById('cl_37') //opcional
    let cl_38 = document.getElementById('cl_38') //opcional
    let cl_39 = document.getElementById('cl_39') //opcional
    let cl_40 = document.getElementById('cl_40') //opcional

    let cl_41 = document.getElementById('cl_41') //opcional
    let cl_42 = document.getElementById('cl_42')
    let cl_43 = document.getElementById('cl_43')
    let cl_44 = document.getElementById('cl_44')
    let cl_45 = document.getElementById('cl_45')
    let cl_46 = document.getElementById('cl_46')
    let cl_47 = document.getElementById('cl_47')
    let cl_48 = document.getElementById('cl_48')
    let cl_49 = document.getElementById('cl_49')
    let cl_50 = document.getElementById('cl_50')

    let cl_51 = document.getElementById('cl_51')


    // Obtencion de los campos del Co-aplicante (co_)
    
    let co_1 = document.getElementById('co_1') 
    let co_2 = document.getElementById('co_2')
    let co_3 = document.getElementById('co_3')
    let co_4 = document.getElementById('co_4')
    let co_5 = document.getElementById('co_5')
    let co_6 = document.getElementById('co_6') //opcional
    let co_7 = document.getElementById('co_7')
    let co_9 = document.getElementById('co_9')
    let co_10 = document.getElementById('co_10')

    let co_11 = document.getElementById('co_11')
    let co_12= document.getElementById('co_12')
    let co_13 = document.getElementById('co_13')
    let co_14 = document.getElementById('co_14') 
    let co_15 = document.getElementById('co_15') //opcional
    let co_16 = document.getElementById('co_16') 
    let co_17 = document.getElementById('co_17') //opcional
    let co_18 = document.getElementById('co_18') //opcional
    let co_19 = document.getElementById('co_19') //opcional
    let co_20 = document.getElementById('co_20') //opcional

    let co_21 = document.getElementById('co_21')
    let co_22 = document.getElementById('co_22')
    let co_23 = document.getElementById('co_23')
    let co_24 = document.getElementById('co_24')
    let co_25 = document.getElementById('co_25')
    let co_26 = document.getElementById('co_26')
    let co_27 = document.getElementById('co_27')
    let co_28 = document.getElementById('co_28') 
    let co_29 = document.getElementById('co_29') //opcional
    let co_30 = document.getElementById('co_30')

    let co_31 = document.getElementById('co_31')
    let co_32 = document.getElementById('co_32')
    let co_33 = document.getElementById('co_33') 
    let co_34 = document.getElementById('co_34') //opcional
    let co_35 = document.getElementById('co_35') //opcional
    let co_36 = document.getElementById('co_36') //opcional

// Fin de obtencion de los campos


// Boton enviar
let btn_enviar_customer = document.getElementById('btn-enviar-customer')

//Metodo click guardar cliente

btn_enviar_customer.addEventListener('click', () => {

    // Comprobar si los campos obligatorios del cliente estan llenos
    if(cl_1.value.length > 0 &&
        cl_2.value.length > 0 &&
        cl_3.value.length > 0 &&
        cl_4.value.length > 8 &&
        cl_6.value.length > 0 &&
        cl_8.value.length > 0 &&
        cl_9.value.length > 0 &&
        cl_10.value.length > 0 &&

        cl_11.value.length > 0 &&
        cl_12.value.length > 0 &&
        cl_13.value.length > 0 &&
        cl_15.value.length > 11 &&
        cl_20.value.length > 0 &&

        cl_21.value.length > 0 &&
        cl_22.value.length > 0 &&
        cl_23.value.length > 0 &&
        cl_24.value.length > 0 &&
        cl_25.value.length > 0 &&
        cl_26.value.length > 0 &&
        cl_27.value.length > 0 &&
        cl_29.value.length > 0 &&
        cl_30.value.length > 0 &&

        cl_31.value.length > 0 &&
        cl_32.value.length > 0 &&

        cl_42.value.length > 0 &&
        cl_43.value.length > 0 &&
        cl_44.value.length > 0 &&
        cl_45.value.length > 0 &&
        cl_46.value.length > 0 &&
        cl_47.value.length > 0 &&
        cl_48.value.length > 0 &&
        cl_49.value.length > 0 &&
        cl_50.value.length > 0 &&

        cl_51.value.length > 0 &&

        cl_cantidad_financiada.value.length > 0 &&
        cl_nombre_representante.value.length > 0 &&

        avatar_selected != 0
        )
    {

        // Comprobador para ver si los campos no se pasan del limite de caracteres permitidos
        if(cl_1.value.length <= 100 &&
            cl_2.value.length <= 100 &&
            cl_3.value.length <= 20 &&
            cl_4.value.length <= 30 &&
            cl_5.value.length <= 30 &&
            cl_6.value.length <= 50 &&
            cl_8.value.length <= 20 &&
            cl_9.value.length <= 300 &&
            cl_10.value.length <= 50 &&

            cl_11.value.length <= 50 &&
            cl_12.value.length <= 50 &&
            cl_13.value.length <= 30 &&
            cl_14.value.length <= 20 &&
            cl_15.value.length <= 20 &&
            cl_16.value.length <= 300 &&
            cl_17.value.length <= 50 &&
            cl_18.value.length <= 50 &&
            cl_19.value.length <= 30 &&
            cl_20.value.length <= 50 &&

            cl_21.value.length <= 50 &&
            cl_22.value.length <= 300 &&
            cl_23.value.length <= 50 &&
            cl_24.value.length <= 20 &&
            cl_25.value.length <= 50 &&
            cl_26.value.length <= 50 &&
            cl_27.value.length <= 50 &&
            cl_28.value.length <= 100 &&
            cl_29.value.length <= 30 &&
            cl_30.value.length <= 100 &&

            cl_31.value.length <= 100 &&
            cl_32.value.length <= 30 &&
            cl_33.value.length <= 20 &&
            cl_34.value.length <= 100 &&
            cl_35.value.length <= 50 &&
            cl_36.value.length <= 10 &&
            cl_37.value.length <= 10 &&
            cl_38.value.length <= 100 &&
            cl_39.value.length <= 100 &&
            cl_40.value.length <= 30 &&
            
            cl_41.value.length <= 30 &&
            cl_42.value.length <= 100 &&
            cl_43.value.length <= 300 &&
            cl_44.value.length <= 20 &&
            cl_45.value.length <= 50 &&
            cl_46.value.length <= 100 &&
            cl_47.value.length <= 300 &&
            cl_48.value.length <= 20 &&
            cl_49.value.length <= 50 &&
            cl_50.value.length <= 20 &&

            cl_51.value.length <= 10 &&

            cl_cantidad_financiada.value.length <= 50 &&
            cl_nombre_representante.value.length <= 100
            )
        {
            if(cl_51.value == 'si')
            {
                // Comprobar si los campos obligatorios del Co-aplicante estan llenos
                if(co_1.value.length > 0 &&
                    co_2.value.length > 0 &&
                    co_3.value.length > 0 &&
                    co_4.value.length > 0 &&
                    co_5.value.length > 0 &&
                    co_7.value.length > 0 &&
                    co_9.value.length > 0 &&
                    co_10.value.length > 0 &&

                    co_11.value.length > 0 &&
                    co_12.value.length > 0 &&
                    co_13.value.length > 0 &&
                    co_14.value.length > 11 &&
                    co_16.value.length > 0 &&

                    co_21.value.length > 0 &&
                    co_22.value.length > 0 &&
                    co_23.value.length > 0 &&
                    co_24.value.length > 0 &&
                    co_25.value.length > 0 &&
                    co_26.value.length > 0 &&
                    co_27.value.length > 0 &&
                    co_28.value.length > 0 &&
                    co_30.value.length > 0 &&

                    co_31.value.length > 0 &&
                    co_32.value.length > 0 &&
                    co_33.value.length > 0
                    )
                {
                    // Comprobar si los campos del Co-aplicante no superan el maximo de lo permitido
                    if(co_1.value.length <= 100 &&
                        co_2.value.length <= 100 &&
                        co_3.value.length <= 100 &&
                        co_4.value.length <= 20 &&
                        co_5.value.length <= 30 &&
                        co_6.value.length <= 30 &&
                        co_7.value.length <= 50 &&
                        co_9.value.length <= 20 &&
                        co_10.value.length <= 300 &&

                        co_11.value.length <= 50 &&
                        co_12.value.length <= 50 &&
                        co_13.value.length <= 50 &&
                        co_14.value.length <= 30 &&
                        co_15.value.length <= 20 &&
                        co_16.value.length <= 20 &&
                        co_17.value.length <= 300 &&
                        co_18.value.length <= 50 &&
                        co_19.value.length <= 50 &&
                        co_20.value.length <= 30 &&

                        co_21.value.length <= 50 &&
                        co_22.value.length <= 50 &&
                        co_23.value.length <= 300 &&
                        co_24.value.length <= 50 &&
                        co_25.value.length <= 20 &&
                        co_26.value.length <= 50 &&
                        co_27.value.length <= 50 &&
                        co_28.value.length <= 20 &&
                        co_29.value.length <= 100 &&
                        co_30.value.length <= 30 &&

                        co_31.value.length <= 100 &&
                        co_32.value.length <= 100 &&
                        co_33.value.length <= 30 &&
                        co_34.value.length <= 20 &&
                        co_35.value.length <= 100 &&
                        co_36.value.length <= 50
                        )
                    {
                        // paso de los valores a php por medio de Ajax para ingresar a la base de datos
                        let request = new XMLHttpRequest()
                        request.open('POST', 'backend/php/register-customer.php', true)
                        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                        request.onreadystatechange = function () {

                            if (request.readyState == 4 && request.status == 200) {

                                if(request.responseText == "status:Correct - status:Correct" || request.responseText == "status:Correct - status:none")
                                {
                                    // Funcion para hacer aparecer la ventana de notificacion
                                    aparecer_n_2('Cliente y co-aplicantes registrados con exito')

                                    // Redireccion para ver los clientes
                                    setTimeout(function(){

                                        window.location.href = 'crm-contact.html'
                                    }, 2000)
                                }
                            }
                        }

                        request.send(`cl_1=${cl_1.value} & cl_2=${cl_2.value} & cl_3=${cl_3.value} & cl_4=${cl_4.value} & cl_5=${cl_5.value} & cl_6=${cl_6.value} & cl_8=${cl_8.value} & cl_9=${cl_9.value} & cl_10=${cl_10.value} & cl_11=${cl_11.value} &cl_12=${cl_12.value} &cl_13=${cl_13.value} &cl_14=${cl_14.value} & cl_15=${cl_15.value} & cl_16=${cl_16.value} & cl_17=${cl_17.value} & cl_18=${cl_18.value} & cl_19=${cl_19.value} & cl_20=${cl_20.value} & cl_21=${cl_21.value} & cl_22=${cl_22.value} & cl_23=${cl_23.value} & cl_24=${cl_24.value} & cl_25=${cl_25.value} & cl_26=${cl_26.value} &cl_27=${cl_27.value} & cl_28=${cl_28.value} & cl_29=${cl_29.value} & cl_30=${cl_30.value} & cl_31=${cl_31.value} & cl_32=${cl_32.value} & cl_33=${cl_33.value} & cl_34=${cl_34.value} & cl_35=${cl_35.value} & cl_36=${cl_36.value} & cl_37=${cl_37.value} & cl_38=${cl_38.value} & cl_39=${cl_39.value} & cl_40=${cl_40.value} & cl_41=${cl_41.value} & cl_42=${cl_42.value} & cl_43=${cl_43.value} & cl_44=${cl_44.value} & cl_45=${cl_45.value} & cl_46=${cl_46.value} & cl_47=${cl_47.value} & cl_48=${cl_48.value} & cl_49=${cl_49.value} & cl_50=${cl_50.value} & cl_51=${cl_51.value} & cl_cantidad_financiada=${cl_cantidad_financiada.value} & cl_nombre_representante=${cl_nombre_representante.value} & avatar_selected=${avatar_selected} & co_1=${co_1.value} & co_2=${co_2.value} & co_3=${co_3.value} & co_4=${co_4.value} & co_5=${co_5.value} & co_6=${co_6.value} & co_7=${co_7.value}& co_9=${co_9.value} & co_10=${co_10.value} & co_11=${co_11.value} & co_12=${co_12.value} & co_13=${co_13.value} & co_14=${co_14.value} & co_15=${co_15.value} & co_16=${co_16.value} & co_17=${co_17.value} & co_18=${co_18.value} & co_19=${co_19.value} & co_20=${co_20.value} & co_21=${co_21.value} & co_22=${co_22.value} & co_23=${co_23.value} & co_24=${co_24.value} & co_25=${co_25.value} & co_26=${co_26.value} & co_27=${co_27.value} & co_28=${co_28.value} & co_29=${co_29.value} & co_30=${co_30.value} & co_31=${co_31.value} & co_32=${co_32.value} & co_33=${co_33.value} & co_34=${co_34.value} & co_35=${co_35.value} & co_36=${co_36.value}`)
                    }
                    else
                    {
                        // Funcion para hacer aparecer la ventana de notificacion
                        aparecer_n_1('Hay uno o mas campos en la informacion para el Co-aplicante que se pasan del limite de caracteres permitidos')
                    }
                }
                else
                {
                    // Funcion para hacer aparecer la ventana de notificacion
                    aparecer_n_1('Debe rellenar todos los campos obligatorios para Co-aplicante')
                    
                    let form_control_all = document.querySelectorAll('.co_invalid')

                    form_control_all.forEach(function(item){

                        if(item.value == "")
                        {
                            item.style.border = '1px solid red'
                        }
                    })

                }
            }
            else if(cl_51.value == 'no')
            {
                // paso de los valores a php por medio de Ajax para ingresar a la base de datos
                let request = new XMLHttpRequest()
                request.open('POST', 'backend/php/register-customer.php', true)
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                request.onreadystatechange = function () {

                    if (request.readyState == 4 && request.status == 200) {

                        if(request.responseText == "status:Correct - status:Correct" || request.responseText == "status:Correct - status:none")
                            {
                                // Funcion para hacer aparecer la ventana de notificacion
                                aparecer_n_2('Cliente registrado con exito')

                                // Redireccion para ver los clientes
                                setTimeout(function(){

                                    window.location.href = 'crm-contact.html'
                                }, 2000)
                            }
                    }
                }
                request.send(`cl_1=${cl_1.value} & cl_2=${cl_2.value} & cl_3=${cl_3.value} & cl_4=${cl_4.value} & cl_5=${cl_5.value} & cl_6=${cl_6.value} & cl_8=${cl_8.value} & cl_9=${cl_9.value} & cl_10=${cl_10.value} & cl_11=${cl_11.value} &cl_12=${cl_12.value} &cl_13=${cl_13.value} &cl_14=${cl_14.value} & cl_15=${cl_15.value} & cl_16=${cl_16.value} & cl_17=${cl_17.value} & cl_18=${cl_18.value} & cl_19=${cl_19.value} & cl_20=${cl_20.value} & cl_21=${cl_21.value} & cl_22=${cl_22.value} & cl_23=${cl_23.value} & cl_24=${cl_24.value} & cl_25=${cl_25.value} & cl_26=${cl_26.value} &cl_27=${cl_27.value} & cl_28=${cl_28.value} & cl_29=${cl_29.value} & cl_30=${cl_30.value} & cl_31=${cl_31.value} & cl_32=${cl_32.value} & cl_33=${cl_33.value} & cl_34=${cl_34.value} & cl_35=${cl_35.value} & cl_36=${cl_36.value} & cl_37=${cl_37.value} & cl_38=${cl_38.value} & cl_39=${cl_39.value} & cl_40=${cl_40.value} & cl_41=${cl_41.value} & cl_42=${cl_42.value} & cl_43=${cl_43.value} & cl_44=${cl_44.value} & cl_45=${cl_45.value} & cl_46=${cl_46.value} & cl_47=${cl_47.value} & cl_48=${cl_48.value} & cl_49=${cl_49.value} & cl_50=${cl_50.value} & cl_51=${cl_51.value} & cl_cantidad_financiada=${cl_cantidad_financiada.value} & cl_nombre_representante=${cl_nombre_representante.value} & avatar_selected=${avatar_selected}`)

            }
        }
        else
        {   
            // Funcion para hacer aparecer la ventana de notificacion
            aparecer_n_1('Hay uno o mas campos que se pasan del limite de caracteres permitidos en la informacion del Co-aplicante')
        }

    }
    else
    {
        aparecer_n_1('Debe rellenar todos los campos obligatorios')
        let form_control_all = document.querySelectorAll('.cl_invalid')

        form_control_all.forEach(function(item){

            if(avatar_selected < 1)
            {
                
                avatar_invalid.style.border = '1px solid red'
            }

            if(item.value == "")
            {
                item.style.border = '1px solid red'
            }
        })
    }
})

// acceso a todos los elementos con la clase form control para ponerles un evento change

const form_control_all_change = document.querySelectorAll('.form-control')

form_control_all_change.forEach(function(item){

    item.addEventListener('change', ()=>{

        item.style.border = '1px solid #e7e7e7'
    })
})

// funcion para quitar borde rojo del contenedor de los avatars al seleccionar un avatar
function quitar_borde()
{
    avatar_invalid.style.border = 'none'
}