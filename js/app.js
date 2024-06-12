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
            let html2 = ``;

            if(data.length > 0){
                data.map(x => {
                    const {id,dni,celular,campana} = x;
                    html = html + `<tr><td>${id}</td><td>${dni}</td><td>${celular}</td><td>${campana}</td></tr>`;

                    html2 = html2 + `<button class="btn btn-danger" onclick="eliminar_campana(${id})">Eliminar</button>
                    <button class="btn btn-warning">Actualizar</button><br>`;

                });
            }else{
                html = html + `<tr><td class='text-center' colspan='5'>No se encontraron resultados</td>`;
            }

            $("#listar_fucampanas").html(html);
            $("#pruebaexcel").html(html2);
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


function sendMail() {
    var sendername = document.getElementById("sendername").value.trim();
    var to = document.getElementById("to").value.trim();
    var message = document.getElementById("message").value.trim();
    var subject = document.getElementById("subject").value.trim();
    var replyto = document.getElementById("replyto").value.trim();
    
    // Limpiar los contenedores de alertas antes de agregar nuevas alertas
    document.getElementById("sendername-alert").innerHTML = "";
    document.getElementById("subject-alert").innerHTML = "";
    document.getElementById("message-alert").innerHTML = "";

    var hasError = false;

    if (sendername.length == 0) {
        document.getElementById("sendername-alert").innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa tu nombre.
        </div>`;
        hasError = true;
    }

    if (to.length == 0) {
        document.getElementById("subject-alert").innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un destinatario.
        </div>`;
        hasError = true;
    }

    if (subject.length == 0) {
        document.getElementById("subject-alert").innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un asunto.
        </div>`;
        hasError = true;
    }

    if (replyto.length == 0) {
        document.getElementById("subject-alert").innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un correo de respuesta.
        </div>`;
        hasError = true;
    }

    if (message.length == 0) {
        document.getElementById("message-alert").innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un mensaje.
        </div>`;
        hasError = true;
    }

    // Si hay algún error, detener la ejecución
    if (hasError) {
        return;
    }

    (function() {
        emailjs.init("SZdN821G8VoZ8ZKF9"); // Llave pública de la cuenta
    })();

    var params = {
        sendername: sendername,
        to: to,
        subject: subject,
        replyto: replyto,
        message: message,
    };

    var serviceID = "service_9omv6zk"; // email service id
    var templateID = "template_1nlut2o"; // email template id

    emailjs.send(serviceID, templateID, params)
        .then(res => {
            Swal.fire({
                title: "Enviado",
                text: "El correo se envió correctamente.",
                icon: "success"
            });
        })
        .catch(error => {
            Swal.fire({
                title: "Error",
                text: "Hubo un problema al enviar el correo. Por favor, intenta nuevamente.",
                icon: "error"
            });
        });
}



