<main class="content mt-3 px-5 py-4">
    <div class="container-fluid">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title fw-bold">
                    Empleados
                </h5>
            </div>
            <div class="card-body p-4">
                <form id="form_filtro_empleados">
                    <div class="row">
                        <div class="col-lg-5">

                            <select class="form-select mb-4" aria-label="Default select example" id="rol" name="rol">
                                <option value="0">Seleccionar el rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                                <option value="3">Asesor</option>
                            </select>
                        </div>
                        <div class="col-lg-5">
                            <select class="form-select mb-4" aria-label="Default select example" id="estado" name="estado">
                                <option value="0">Seleccionar el estado</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>


                        <div class="col-lg-2 mb-3">
                            <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>

                        </div>
                    </div>
                </form>
                <div class="col-lg-12 d-flex justify-content-end mb-4">
                        <button type="button" class="btn btn-warning px-5 text-white" data-bs-toggle="modal" data-bs-target="#agregar-usuario">
                            Agregar
                        </button>
                    </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="listar_empleados">
                            <tr>
                                <td colspan="8" class="text-center">No hay datos</td>
                            </tr>
                        </tbody>
                    </table>                 
                </div>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title fw-bold">
                    Ventas
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row">

                    <div class="col-lg-5 mb-4">
                        <form id="form_venta_usuario">
                            <select class="form-select" name="id_usuario" id="id_usuario">
                                <option value="">Selecciona el empleado</option>
                            </select>
                    </div>
                    <div class="col-lg-5 mb-3">
                        <select class="form-select" name="mes" id="mes">
                            <option selected>Selecciona el mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        </form>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <div id="bg-card-ld" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex justify-content-center">
                                                <img src="img/money.png" style="width: 4rem;" />
                                            </div>
                                            <div class="col-lg-8">
                                                <h5 id="ldc-card-tittle" class="card-title">LD</h5>
                                                <h6 class="card-subtitle mb-2 text-body-secondary">Prestamo Personal</h6>
                                                <div id="ld_cantidad_text">
                                                    <p class="card-text">Cant. 0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div id="bg-card-tc" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex justify-content-center">
                                                <img src="img/card.png" style="width: 4rem;" />
                                            </div>
                                            <div class="col-lg-8">
                                                <h5 id="tcc-card-tittle" class="card-title">TC</h5>
                                                <h6 class="card-subtitle mb-2 text-body-secondary">Tarjeta de crédito</h6>
                                                <div id="tc_cantidad_text">
                                                    <p class="card-text">Cant. 0 </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div id="bg-card-ldm" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex justify-content-center">
                                                <img src="img/bag-coin.png" style="width: 4rem;" />
                                            </div>
                                            <div class="col-lg-8">
                                                <h5 id="ldm-card-tittle" class="card-title">Monto de LD</h5>
                                                <h6 class="card-subtitle mb-2 text-body-secondary">Total de Crédito</h6>
                                                <div id="ld_monto_text">
                                                    <p class="card-text">S/. 0.0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="editar-usuario" tabindex="-1" aria-labelledby="editar-usuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editar-usuarioLabel">Actualizar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formActualizarEmpleado">
                    <input type="hidden" name="opcion" value="actualizar_usuarios">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>  
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña:</label>
                        <input type="text" class="form-control" id="contrasena" name="contrasena">
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol:</label>
                        <select class="form-select" name="rol" id="rol2">
                            <option value="0">Estado de campaña</option>
                            <option value="1">Administrador</option>
                            <option value="2">Operador</option>
                            <option value="3">Asesor</option>
                        </select>
                    </div>     
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" name="estado" id="estado2">
                            <option value="0">Estado de campaña</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div> 


<div class="modal fade" id="agregar-usuario" tabindex="-1" aria-labelledby="agregar-usuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="agregar-usuarioLabel">Agregar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAgregarEmpleado">
                    <input type="hidden" name="opcion" value="agregar_usuario">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña:</label>
                        <input type="text" class="form-control" id="contrasena" name="contrasena">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>  
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol:</label>
                        <select class="form-select" name="rol" id="rol2">
                            <option value="0">Estado de campaña</option>
                            <option value="1">Administrador</option>
                            <option value="2">Operador</option>
                            <option value="3">Asesor</option>
                        </select>
                    </div>     
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" name="estado" id="estado2">
                            <option value="0">Estado de campaña</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

