$(function () {
  listar_consultas();
  rellenar_consulta();
  crear_consultas();
  filtro_consultas();
  actualizar_consulta();

  contar_ld();
  contar_tc();
  contar_ld_monto();
  listar_ventas();
  crear_ventas();
  

  listar_empleados();
  ventas_x_usuario();
  select_usuarios();
  filtro_empleados();
  base_x_dni();
  listarRegistros(1);
  construirPaginacion();
  listar_metas();
  actualizar_usuarios();
  crear_usuarios();
  
});


const base_x_dni = function (){
  $("#form_filtro_base").submit(function (e){
    e.preventDefault();
    var dni = document.getElementById("dni").value.trim();
    $.ajax({
      url: "controller/base.php",
      method: "POST",
      data: {
        dni: dni,
        option: "base_x_dni", 
      },
      success: function (response){
        const data = JSON.parse(response);
        let html = ``;
        if(data.length > 0){
          data.map((x) => {
            const {id,
              dni,
              nombres,
              tipo_cliente,
              direccion,
              distrito,
              credito_max,
              linea_max,
              plazo_max,
              tem,
              celular_1,
              celular_2,
              celular_3,
              tipo_producto,
              combo,
            } = x;
            html =
            html +
            `<tr><td>${id}</td><td>${nombres}</td><td>${dni}</td><td>${tipo_cliente}</td><td>${direccion}</td><td>${distrito}</td><td>S/.${credito_max}</td><td>S/.${linea_max}</td><td>${plazo_max}</td><td>${tem}%</td><td>${celular_1}</td><td>${celular_2}</td><td>${celular_3}</td><td>${tipo_producto}</td><td>${combo}</td><td>
                <a onclick="obtener_base(${id})"><i class="fa-solid fa-plus me-4"></i></a>
                <a onclick="eliminar_base(${id})"><i class="fa-solid fa-trash"></i></a>
              </td></tr>`;
        
          });
        }else{
          alert("No se encontro resultados. COLOCAR UNA ALERTA CON BOOSTRAP")
          listarRegistros();
          
        }
        $("#listar_base").html(html);       
      }
    })
  });
};

const listarRegistros = function (pagina) {
  $.ajax({
    url: "controller/base.php",
    type: "POST",
    data: { option: "listar", pagina: pagina },
    dataType: "json",
    success: function (response) {
      let html = "";
      if (response.length > 0) {
        response.map((x) => {
          const {
            id,
            dni,
            nombres,
            tipo_cliente,
            direccion,
            distrito,
            credito_max,
            linea_max,
            plazo_max,
            tem,
            celular_1,
            celular_2,
            celular_3,
            tipo_producto,
            combo,
          } = x;
          html =
            html +
            `<tr><td>${id}</td><td>${nombres}</td><td>${dni}</td><td>${tipo_cliente}</td><td>${direccion}</td><td>${distrito}</td><td>S/.${credito_max}</td><td>S/.${linea_max}</td><td>${plazo_max}</td><td>${tem}%</td><td>${celular_1}</td><td>${celular_2}</td><td>${celular_3}</td><td>${tipo_producto}</td><td>${combo}</td><td>
                <a onclick="obtener_base(${id})"><i class="fa-solid fa-plus me-4"></i></a>
                <a onclick="eliminar_base(${id})"><i class="fa-solid fa-trash"></i></a>
              </td></tr>`;
        });
      } else {
        html = `<tr><td class='text-center' colspan='14'>No hay datos registrados</td></tr>`;
      }
      $("#listar_base").html(html);

      construirPaginacion(pagina); // Llamar a la función de construcción de paginación
    },
  });
};
function construirPaginacion(pagina_actual) {
  $.ajax({
    url: "controller/base.php",
    type: "POST",
    data: { option: "contar" },
    dataType: "json",
    success: function (response) {
      let total_registros = response.total;
      let por_pagina = 5; // Cantidad de registros por página
      let total_paginas = Math.ceil(total_registros / por_pagina);
      let html = "";

      if (total_paginas > 1) {
        // Botón anterior
        html += `<li class="page-item ${pagina_actual == 1 ? "disabled" : ""}">
                          <a class="page-link" href="javascript:void(0);" onclick="listarRegistros(${
                            pagina_actual - 1
                          });">Anterior</a>
                      </li>`;

        // Botones de páginas
        for (let i = 1; i <= total_paginas; i++) {
          html += `<li class="page-item ${pagina_actual == i ? "active" : ""}">
                              <a class="page-link" href="javascript:void(0);" onclick="listarRegistros(${i});">${i}</a>
                          </li>`;
        }

        // Botón siguiente
        html += `<li class="page-item ${
          pagina_actual == total_paginas ? "disabled" : ""
        }">
                          <a class="page-link" href="javascript:void(0);" onclick="listarRegistros(${
                            pagina_actual + 1
                          });">Siguiente</a>
                      </li>`;
      }

      $("#paginacion").html(html);
    },
  });
}

const ventas_x_usuario = function () {
  $("#form_venta_usuario").submit(function (e) {
    e.preventDefault();
    var id_usuario = document.getElementById("id_usuario").value.trim();
    var mes = document.getElementById("mes").value.trim();
    $.ajax({
      url: "controller/ventas.php",
      method: "POST",
      data: {
        id_usuario: id_usuario,
        mes: mes,
        option: "ventas_x_usuario",
      },
      success: function (response) {
        const data = JSON.parse(response);
        let ld_cant_html = ``;
        let tc_cant_html = ``;
        let ld_mont_html = ``;
        //console.log(data);
        if (data.length > 0) {
          data.map((x) => {
            const { ld_cantidad, tc_cantidad, ld_monto } = x;
            ld_cant_html =
              ld_cant_html + `<p class="card-text">Cant. ${ld_cantidad}</p>`;
            tc_cant_html =
              tc_cant_html + `<p class="card-text">Cant. ${tc_cantidad}</p>`;
            ld_mont_html =
              ld_mont_html + `<p class="card-text">S/. ${ld_monto}</p>`;
          });
        } else {
          ld_cant_html = ld_cant_html + `<p class="card-text">Cant. 0</p>`;
          tc_cant_html = tc_cant_html + `<p class="card-text">Cant. 0</p>`;
          ld_mont_html = ld_mont_html + `<p class="card-text">S/. 0.0</p>`;
        }
        $("#ld_cantidad_text").html(ld_cant_html);
        $("#tc_cantidad_text").html(tc_cant_html);
        $("#ld_monto_text").html(ld_mont_html);
      },
    });
  });
};

const listar_metas = function () {
  $.ajax({
    url: "controller/meta.php",
    success: function (response) {
      const data = JSON.parse(response);
      let html = ``;
      if (data.length > 0) {
        data.map((metas_por_usuario) => {
            let usuario = null;
            if (metas_por_usuario.id_usuario === 1) {
                usuario = "Administrador"
            } else if (metas_por_usuario.id_usuario === 3) {
                usuario = "Asesor"
            }
            let mes = null;
            if (metas_por_usuario.mes === "1") {
              mes = "Enero";
            } else if (metas_por_usuario.mes === "2") {
              mes = "Febrero";
            } else if (metas_por_usuario.mes === "3") {
              mes = "Marzo";
            } else if (metas_por_usuario.mes === "4") {
              mes = "Abril";
            } else if (metas_por_usuario.mes === "5") {
              mes = "Mayo";
            } else if (metas_por_usuario.mes === "6") {
              mes = "Junio";
            } else if (metas_por_usuario.mes === "7") {
              mes = "Julio";
            } else if (metas_por_usuario.mes === "8") {
              mes = "Agosto";
            } else if (metas_por_usuario.mes === "9") {
              mes = "Septiembre";
            } else if (metas_por_usuario.mes === "10") {
              mes = "Octubre";
            } else if (metas_por_usuario.mes === "11") {
              mes = "Noviembre";
            } else if (metas_por_usuario.mes === "12") {
              mes = "Diciembre";
            }
          
          html = html + `<tr>
          <th scope="row">
          ${metas_por_usuario.id}
          </th><td>${metas_por_usuario.ld_cantidad}
          </td><td>${metas_por_usuario.ld_monto}
          </td><td>${metas_por_usuario.tc_cantidad}
          </td><td>${usuario}</td><td>${mes}
          </td><td>${metas_por_usuario.cumplido}
          </td><td><a onclick="obtener_metas(${metas_por_usuario.id})"><i class="fa-solid fa-pencil me-4"></i></a>
          <a onclick="eliminar_meta(${metas_por_usuario.id})"><i class="fa-solid fa-trash"></i></a>
          </td></tr>`;
        });
      } else {
        html =
          html +
          `<tr><td class='text-center' colspan='8'>No se encontraron resultados</td></tr>`;
      }
      $("#listar_metas").html(html);
    },
  });
};
const eliminar_meta = function (id) {
  $.ajax({
    url: "controller/meta.php",
    method: "POST",
    data: {
      id: id,
      option: "eliminar_meta",
    },
    success: function (data) {
      if (data == "ok") {
        listar_metas();
      }
    },
  });
};
const obtener_metas = function (id) {
  $("#editar-metas").modal("show");
  $.ajax({
    url: "controller/meta.php",
    method: "POST",
    data: {
      id: id,
      option: "obtener_x_id",
    },
    success: function (response) {
      data = JSON.parse(response);
      $.each(data, function (i, e) {
        $("#id").val(data[i]["id"]);
        $("#modal_ld_cantidad").val(data[i]["ld_cantidad"]);
        $("#modal_tc_cantidad").val(data[i]["tc_cantidad"]);
        $("#modal_ld_monto").val(data[i]["ld_monto"]);
        $("#modal_id_usuario").val(data[i]["id_usuario"]);
        $("#modal_mes").val(data[i]["mes"]);
        $("#modal_cumplido").val(data[i]["cumplido"]);
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener la meta: ", error);
      alert("Hubo un error al obtener la meta.");
    }
  });
};
const actualizar_meta = function(){
  $("#formActualizarMeta").submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: "controller/meta.php",
      method: "POST",
      data: data,
      success: function(response) {
          if (response == "ok") {
              listar_metas();
              $("#editar-metas").modal('hide');
              $("#formActualizarMeta").trigger("reset");
          }else{
            alert("Algo salió mal.")
          }
      }
    })
  })
}

const obtener_base = function (id) {
  $("#obtener-base").modal("show");
  $.ajax({
    url: "controller/base.php",
    method: "POST",
    data: {
      id: id,
      option: "base_x_id",
    },
    success: function (response) {
      data = JSON.parse(response);
      $.each(data, function (i, e) {
        $("#id").val(data[i]["id"]);
        $("#nombres").val(data[i]["nombres"]);
        $("#dni2").val(data[i]["dni"]);
        $("#celular_1").val(data[i]["celular_1"]);
        $("#credito_max").val(data[i]["credito_max"]);
        $("#plazo_max").val(data[i]["plazo_max"]);
        $("#tipo_producto").val(data[i]["tipo_producto"]);
        $("#tem").val(data[i]["tem"]);
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener la meta: ", error);
      alert("Hubo un error al obtener la meta.");
    }
  });
};


/* -------------------   VENTAS   ---------------------- */

const listar_ventas = function(){
  $.ajax({
    url: "controller/ventas.php",
    success: function (response){
      const data = JSON.parse(response);
      let html = ``;
      if(data.length > 0){
        data.map((x) => {
          const {id, nombres, dni, celular, credito, linea, plazo, tem, usuario, tipo_producto, estado} = x;
          html = html + `<tr>
              <td>${id}</td>
              <td>${nombres}</td>
              <td>${dni}</td>
              <td>${celular}</td>
              <td>S/.${credito}</td>
              <td>S/.${linea}</td>
              <td>${plazo}</td>
              <td>${tem}%</td>
              <td>${usuario}</td>
              <td>${tipo_producto}</td>
              <td>${estado}</td>
              <td>
                <a onclick="obtener_ventas(${id})"><i class="fa-solid fa-pencil me-4"></i></a>
                <a onclick="eliminar_venta(${id})"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>`;
        });  
      }else{
        html = html +
        `<tr><td class='text-center' colspan='11'>No se encontraron resultados.</td>`;
      }
      $("#listar_ventas").html(html);
    }

  })
}
const crear_ventas = function(){
  $("#formObtenerEmpleado").submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();

    $.ajax({
      url: "controller/ventas.php",
      method: "POST",
      data: data,
      success: function(response){

        alert(data);
      }
    })
  })
  

}
var contar_ld = function(){
    $.ajax({
      url: "controller/ventas.php",
      type: "POST",
      data: {
        option: "contar_filas_ld",
      },
      success: function (response) {
          const data = JSON.parse(response);
          let html = ``;
          if(data.length > 0){
            data.map((x) => {
              const {cantidad_ld} = x;
              html = html + `<p class="card-text">Cant. ${cantidad_ld}</p>`;
            });
          }else{
            html = html + `<p class="card-text">Cant. 0</p>`;
          }
          $("#ld_cantidad_text").html(html);
      }
    })
}
var contar_tc = function(){
    $.ajax({
      url: "controller/ventas.php",
      type: "POST",
      data: {
        option: "contar_filas_tc",
      },
      success: function (response) {
          const data = JSON.parse(response);
          let html = ``;
          if(data.length > 0){
            data.map((x) => {
              const {cantidad_tc} = x;
              html = html + `<p class="card-text">Cant. ${cantidad_tc}</p>`;
            });
          }else{
            html = html + `<p class="card-text">Cant. 0</p>`;
          }
          $("#tc_cantidad_text").html(html);
      }
    })
}

var contar_ld_monto = function(){
  $.ajax({
    url: "controller/ventas.php",
    type: "POST",
    data: {
      option: "ld_monto",
    },
    success: function (response) {
        const data = JSON.parse(response);
        let html = ``;
        if(data.length > 0){
          data.map((x) => {
            const {ld_monto} = x;
            html = html + `<p class="card-text">S/. ${ld_monto}</p>`;
          });
        }else{
          html = html + `<p class="card-text">S/. 0.0</p>`;
        }
        $("#ld_monto_text").html(html);
    }
  })
}

/* ----------------------------------------------------- */

/* ------------------   USUARIOS   --------------------- */

const select_usuarios = function () {
  $.ajax({
    url: "controller/ventas.php",
    type: "GET",
    success: function (response) {
      const usuarios = JSON.parse(response);
      var select = $("#id_usuario");
      usuarios.forEach(function (usu) {
        var option = $("<option></option>")
          .attr("value", usu.id)
          .text(usu.nombres + " " + usu.apellidos);
        select.append(option);
      });
    },
  });
};
const filtro_empleados = function () {
  $("#form_filtro_empleados").submit(function (e) {
    e.preventDefault();
    var rol = document.getElementById("rol").value.trim();
    var estado = document.getElementById("estado").value.trim();
    $.ajax({
      url: "controller/usuario.php",
      method: "POST",
      data: {
        rol: rol,
        estado: estado,
        opcion: "filtro_empleados",
      },
      success: function (response) {
        const data = JSON.parse(response);
        let html = ``;
        if (data.length > 0) {
          data.map((usuario) => {
            let rol = null;
            let estado = null;
            if (usuario.estado === "1") {
              estado = "Activo";
            } else if (usuario.estado === "2") {
              estado = "Inactivo";
            }

            if (usuario.rol === "1") {
              rol = "Administrador";
            } else if (usuario.rol === "2") {
              rol = "Operador";
            } else if (usuario.rol === "3") {
              rol = "Asesor";
            }
            html =
              html +
              `<tr><th scope="row">${usuario.id}</th><td>${usuario.usuario}</td><td>${usuario.nombres}</td><td>${usuario.apellidos}</td><td>${rol}</td><td>${estado}</td><td><a onclick="obtener_usuarios(${usuario.id})"><i class="fa-solid fa-pencil me-4"></i></a>
              <a onclick="eliminar_usuario(${usuario.id})"><i class="fa-solid fa-trash"></i></a></td></tr>`;
          });
        } else {
          html =
            html +
            `<tr><td class='text-center' colspan='6'>No se encontraron resultados</td>`;
        }
        $("#listar_empleados").html(html);
      },
    });
  });
};
const listar_empleados = function () {
  $.ajax({
    url: "controller/usuario.php",
    success: function (response) {
      const data = JSON.parse(response);
      let html = ``;
      if (data.length > 0) {
        data.map((usuario) => {
          let rol = null;
          let estado = null;
          if (usuario.estado === "1") {
            estado = "Activo";
          } else if (usuario.estado === "2") {
            estado = "Inactivo";
          }

          if (usuario.rol === "1") {
            rol = "Administrador";
          } else if (usuario.rol === "2") {
            rol = "Operador";
          } else if (usuario.rol === "3") {
            rol = "Asesor";
          }
          html =
            html +
            `<tr><th scope="row">${usuario.id}</th><th scope="row">${usuario.usuario}</th><td>${usuario.nombres}</td><td>${usuario.apellidos}</td><td>${rol}</td><td>${estado}</td><td><a onclick="obtener_usuarios(${usuario.id})"><i class="fa-solid fa-pencil me-4"></i></a>
            <a onclick="eliminar_usuario(${usuario.id})"><i class="fa-solid fa-trash"></i></a></td></tr>`;
        });
      } else {
        html =
          html +
          `<tr><td class='text-center' colspan='4'>No se encontraron resultados</td>`;
      }
      $("#listar_empleados").html(html);
    },
  });
};
const obtener_usuarios = function(id){
  $("#editar-usuario").modal("show");
  $.ajax({
    url: "controller/usuario.php",
    method: "POST",
    data: {
      id: id,
      opcion: "obtener_x_id_usuario",
    },
    success: function (response){
      data = JSON.parse(response);
      $.each(data, function(i, e){
        $("#id").val(data[i]["id"]);
        $("#usuario").val(data[i]["usuario"]);
        $("#contrasena").val(data[i]["contrasena"]);
        $("#nombres").val(data[i]["nombres"]);
        $("#apellidos").val(data[i]["apellidos"]);
        $("#estado2").val(data[i]["estado"]);
        $("#rol2").val(data[i]["rol"]);
        
        $(".fotoPerfil2").html(`<img src="./img/fotos/` + data[i]["foto"] +`" alt="" class='fotoPerfil rounded' style="width: 15rem;">`);
      })
    }
  })
}
const eliminar_usuario = function (id) {
  $.ajax({
    url: "controller/usuario.php",
    method: "POST",
    data: {
      id: id,
      opcion: "eliminar_usuario"
    },
    success: function (data) {
      if (data == "ok") {
        listar_empleados();
      }
    },
  });
};
const actualizar_usuarios = function (id){
  $("#formActualizarEmpleado").submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: "controller/usuario.php",
      method: "POST",
      data: data,
      success: function(response) {
          if (response == "ok") {
              listar_empleados();
              $("#editar-usuario").modal('hide');
              $("#formActualizarEmpleado").trigger("reset");
          }else{
            alert("algo salio mal")
          }
      }
    })
  })
};
const crear_usuarios = function () {
  $("#formAgregarEmpleado").submit(function (e) {
    e.preventDefault();
    const data = new FormData($("#formAgregarEmpleado")[0])

      $.ajax({
        url: "controller/usuario.php",
        method: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,    
        success: function (data) {
          
          
          const response = JSON.parse(data);
          console.log(response);
          if (response.status == 'error') {
            Swal.fire({
              icon: "error",
              title: "Lo sentimos",
              text: response.message,
            });
            
          }else{
            Swal.fire({
              title: "Felicidades",
              text: response.message,
              icon: "success",
            });
            listar_empleados();
            $("#agregar-usuario").modal('hide');
            $("#formAgregarEmpleado").trigger('reset');
          }
        },
      });
    
  });
};

/* ----------------------------------------------------- */

/* ------------------   CONSULTAS   --------------------- */

const listar_consultas = function () {
  $.ajax({
    url: "controller/consultas.php",
    success: function (response) {
      const data = JSON.parse(response);
      let html = ``;
      if (data.length > 0) {
        data.map((x) => {
          const { id, dni, celular, descripcion, campana } = x;
          html =
            html +
            `<tr>
              <td>${id}</td>
              <td>${dni}</td>
              <td>${celular}</td>
              <td>${descripcion}</td>
              <td>${campana}</td>
              <td>
                <a onclick="obtener_consultas(${id})"><i class="fa-solid fa-pencil me-4"></i></a>
                <a onclick="eliminar_consulta(${id})"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>`;
        });
      } else {
        html =
          html +
          `<tr><td class='text-center' colspan='6'>No se encontraron resultados.</td>`;
      }
      $("#listar_consultas").html(html);
    },
  });
};
const rellenar_consulta = function () {
  $("#dni").on("input", function () {
    var dni = document.getElementById("dni").value.trim();

    if (dni.length !== 8) {
      $("#campana").val("No-Found");
    } else {
      $.ajax({
        url: "controller/consultas.php",
        method: "POST",
        data: {
          dni: dni,
          option: "verificar_dni_base",
        },
        success: function (response) {
          if (response == "1") {
            $("#campana").val("Si");
            listar_consultas();
          } else {
            $("#campana").val("No");
            listar_consultas();
          }
        },
      });
    }
  });
};
const verificar_dni_base = function () {
  $("#verificar").click(function (e) {
    e.preventDefault();
    var dni = document.getElementById("dni").value.trim();

    $.ajax({
      url: "controller/consultas.php",
      method: "POST",
      data: {
        dni: dni,
        option: "verificar_dni_base",
      },
      success: function (response) {
        if (response == "1") {
          Swal.fire({
            title: "Felicidades",
            text: "Un asesor se contactara con usted pronto.",
            icon: "success",
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Lo sentimos",
            text: "Usted no cuenta con una campaña este mes, intentelo el siguiente.",
          });
        }
      },
    });
  });
};
const crear_consultas = function () {
  $("#form_consulta").submit(function (e) {
    e.preventDefault();
    var dni = document.getElementById("dni").value.trim();
    var celular = document.getElementById("celular").value.trim();
    var descripcion = document.getElementById("descripcion").value.trim();
    var data = $(this).serialize();
    let html = ``;
    if (dni.length !== 8 || celular.length !== 9) {
      html =
        html +
        `<div class="alert alert-danger" role="alert">
            Cantidad de dígitos errónea. Vuelve a intentarlo.
            </div>`;
    } else {
      $.ajax({
        url: "controller/consultas.php",
        method: "POST",
        data: data,
        success: function (data) {
          if (data == "ok") {
            listar_consultas();
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Algo salio mal",
            });
          }
        },
      });
      $.ajax({
        url: "controller/consultas.php",
        method: "POST",
        data: {
          dni: dni,
          option: "verificar_dni_base",
        },
        success: function (response) {
          if (response == "1") {
            Swal.fire({
              title: "Felicidades",
              text: "Un asesor se contactara con usted pronto.",
              icon: "success",
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Lo sentimos",
              text: "Usted no cuenta con una campaña este mes, intentelo el siguiente.",
            });
          }
        },
      });
    }

    $("#alerta").html(html);
  });
};
const eliminar_consulta = function (id) {
  $.ajax({
    url: "controller/consultas.php",
    method: "POST",
    data: {
      id: id,
      option: "eliminar_consulta",
    },
    success: function (data) {
      if (data == "ok") {
        listar_consultas();
      }
    },
  });
};
const filtro_consultas = function () {
  $("#form_consultas").submit(function (e) {
    e.preventDefault();
    var dni = document.getElementById("c-dni").value.trim();
    var campana = document.getElementById("c-campana").value.trim();
    $.ajax({
      url: "controller/consultas.php",
      method: "POST",
      data: {
        dni: dni,
        campana: campana,
        option: "filtro_consultas",
      },
      success: function (response) {
        console.log(response);
        const data = JSON.parse(response);
        let html = ``;
        if (data.length > 0) {
          data.map((x) => {
            const { id, dni, celular, descripcion, campana } = x;
            html =
              html +
              `<tr>
                <td>${id}</td>
                <td>${dni}</td>
                <td>${celular}</td>
                <td>${descripcion}</td>
                <td>${campana}</td>
                <td>
                  <a onclick="obtener_consultas(${id})"><i class="fa-solid fa-pencil me-4"></i></a>
                  <a onclick="eliminar_consulta(${id})"><i class="fa-solid fa-trash"></i></a></td>
                </tr>`;
          });
        } else {
          html =
            html +
            `<tr><td class='text-center' colspan='6'>No se encontraron resultados.</td>`;
        }
        $("#listar_consultas").html(html);
      },
    });
  });
};
const obtener_consultas = function (id) {
  $("#editar-consulta").modal("show");
  $.ajax({
    url: "controller/consultas.php",
    method: "POST",
    data: {
      id: id,
      option: "obtener_x_id",
    },
    success: function (response) {
      alert(response);
      data = JSON.parse(response);
      $.each(data, function (i, e) {
        $("#id2").val(data[i]["id"]);
        $("#dni2").val(data[i]["dni"]);
        $("#celular2").val(data[i]["celular"]);
        $("#descripcion").val(data[i]["descripcion"]);
        $("#campana2").val(data[i]["campana"]);
      });
    },
  });
};
const actualizar_consulta = function(){
  $("#formActualizarConsulta").submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: "controller/consultas.php",
      method: "POST",
      data: data,
      success: function(response) {
          if (response == "ok") {
              listar_consultas();
              $("#editar-consulta").modal('hide');
              $("#formActualizarConsulta").trigger("reset");
          }else{
            alert("Algo salio mal.")
          }
      }
    })
  })
}

/* ----------------------------------------------------- */

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
    document.getElementById(
      "sendername-alert"
    ).innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa tu nombre.
        </div>`;
    hasError = true;
  }

  if (to.length == 0) {
    document.getElementById(
      "subject-alert"
    ).innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un destinatario.
        </div>`;
    hasError = true;
  }

  if (subject.length == 0) {
    document.getElementById(
      "subject-alert"
    ).innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un asunto.
        </div>`;
    hasError = true;
  }

  if (replyto.length == 0) {
    document.getElementById(
      "subject-alert"
    ).innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un correo de respuesta.
        </div>`;
    hasError = true;
  }

  if (message.length == 0) {
    document.getElementById(
      "message-alert"
    ).innerHTML = `<div class="alert alert-danger" role="alert">
        Por favor, ingresa un mensaje.
        </div>`;
    hasError = true;
  }

  // Si hay algún error, detener la ejecución
  if (hasError) {
    return;
  }

  (function () {
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

  emailjs
    .send(serviceID, templateID, params)
    .then((res) => {
      Swal.fire({
        title: "Enviado",
        text: "El correo se envió correctamente.",
        icon: "success",
      });
    })
    .catch((error) => {
      Swal.fire({
        title: "Error",
        text: "Hubo un problema al enviar el correo. Por favor, intenta nuevamente.",
        icon: "error",
      });
    });
}
// BASE

// const listar_base = function () {
//   $.ajax({
//     url: "controller/base.php",
//     success: function (response) {
//       const data = JSON.parse(response);
//       let html = ``;
//       if (data.length > 0) {
//         data.map((x) => {
//           const {
//             id,
//             nombres,
//             tipo_cliente,
//             direccion,
//             distrito,
//             credito_max,
//             plazo_max,
//             tem,
//             celular_1,
//             celular_2,
//             celular_3,
//             tipo_producto,
//             combo,
//           } = x;
//           html =
//             html +
//             `<tr><td>${id}</td><td>${nombres}</td><td>${tipo_cliente}</td><td>${direccion}</td><td>${distrito}</td><td>${credito_max}</td><td>${plazo_max}</td><td>${tem}%</td><td>${celular_1}</td><td>${celular_2}</td><td>${celular_3}</td><td>${tipo_producto}</td><td>${combo}</td></tr>`;
//         });
//       } else {
//         html =
//           html +
//           `<tr><td class='text-center' colspan='13'>No se encontraron resultados</td>`;
//       }
//       $("#listar_base").html(html);
//     },
//   });
// };
