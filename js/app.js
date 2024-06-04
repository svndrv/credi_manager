$(function(){
    listar_fucampanas();
    //verificar_dni();
    crear_campanas();
    rellenar_campana();
    
})


const rellenar_campana = function(){
    $('#dni').on('input', function() {
        var dni = document.getElementById("dni").value.trim();  
        
        if (dni.length !== 8) {
            $('#campana').val('No-Found');
        } else {
            
            $.ajax({
                url: "controller/campanas.php",
                method: "POST",
                data: {
                    dni: dni,
                    option: "verificar_campana"
                },
                success: function(response){  
                        
                    if(response == '1'){
                        
                        $("#campana").val("Si")
                        listar_fucampanas();
                        
                        
                    }else{
                        $("#campana").val("No");
                        listar_fucampanas();
                        
                    }
                }
            })
        }
        
    });
}

const listar_fucampanas = function() {
    $.ajax({
        url: "controller/campanas.php",
        success: function(response){
            //console.log(response)
            const data = JSON.parse(response);
            
            let html = ``;

            if(data.length > 0){
                data.map(x => {
                    const {id,dni,celular,campana} = x;
                    html = html + `<tr><td>${id}</td><td>${dni}</td><td>${celular}</td><td>${campana}</td><td>
                    <button class="btn btn-danger" onclick="eliminar_campana(${id})">Eliminar</button>
                    <button class="btn btn-warning">Actualizar</button></td></tr>`;
                });
            }else{
                html = html + `<tr><td class='text-center' colspan='5'>No se encontraron resultados</td>`;
            }

            $("#listar_fucampanas").html(html);
        }
    })
}

const eliminar_campana = function(id){
    $.ajax({
        url: "controller/campanas.php",
        method: "POST",
        data: {
            id:id,
            option: "eliminar_campana"
        },
        success: function(data){
            if(data == "ok"){
                listar_fucampanas();
            }
        }
    })
}

const verificar_dni = function(){
    $("#verificar").click(function(e){
        e.preventDefault();
        var dni = document.getElementById("dni").value.trim();
       
        $.ajax({
            url: "controller/campanas.php",
            method: "POST",
            data: {
                dni: dni,
                option: "verificar_dni"
            },
            success: function(response){           
                if(response == '1'){
                    Swal.fire({
                        title: "Felicidades",
                        text: "Un asesor se contactara con usted pronto.",
                        icon: "success"
                      });
                    
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Lo sentimos",
                        text: "Usted no cuenta con una campaña este mes, intentelo el siguiente."          
                      });
                } 
            }
        })

    })   
}

const crear_campanas = function (){

    
    $("#form_consulta").submit(function(e){     
        e.preventDefault();
        var dni = document.getElementById("dni").value.trim();
        var celular = document.getElementById("celular").value.trim();
        var data = $(this).serialize();
        let html = ``; 
        if(dni.length !== 8 || celular.length !== 9){    
            html = html + `<div class="alert alert-danger" role="alert">
            Cantidad de dígitos errónea. Vuelve a intentarlo.
            </div>`;
        }else{        
            $.ajax({
                url: "controller/campanas.php",
                method: "POST",
                data: data,
                success: function(data){     
                      
                    if(data == "ok"){       
                                  
                        listar_fucampanas();
                    }else{
                        
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Algo salio mal"                     
                          });
                    }
                }
            })
            $.ajax({
                url: "controller/campanas.php",
                method: "POST",
                data: {
                    dni: dni,
                    option: "verificar_dni"
                },
                success: function(response){           
                    if(response == '1'){
                        //$("#campana").val("Si")
                        Swal.fire({
                            title: "Felicidades",
                            text: "Un asesor se contactara con usted pronto.",
                            icon: "success"
                          });
                        
                    }else{
                        //$("#campana").val("No");
                        Swal.fire({
                            icon: "error",
                            title: "Lo sentimos",
                            text: "Usted no cuenta con una campaña este mes, intentelo el siguiente."          
                          });
                    } 
                }
            })
        }

        $("#alerta").html(html);

    })   
}


function sendMail(){

    var sendername = document.getElementById("sendername").value.trim();
    var to = document.getElementById("to").value.trim();
    var message = document.getElementById("message").value.trim();

    if(sendername.length == 0 || to.length == 0 || message.length == 0){
        alert("ingresa contenido a las casillas.")
        // hacer que se haga una alerta con html
    }else{
        (function(){
            emailjs.init("SZdN821G8VoZ8ZKF9"); // Llave publica de la cuenta
        })();
    
        var params = {
            sendername : document.querySelector("#sendername").value,
            to : document.querySelector("#to").value,
            subject : document.querySelector("#subject").value,
            replyto : document.querySelector("#replyto").value,
            message : document.querySelector("#message").value,
        };
    
        var serviceID = "service_9omv6zk"; //email service id
        var templateID = "template_1nlut2o"; // email template id
    
        emailjs.send(serviceID, templateID, params)
        .then(res => {
            Swal.fire({
                title: "Se envio",
                text: "Se envio correctamente el correo.",
                icon: "success"
              });
        })
        .catch();
    }
}


