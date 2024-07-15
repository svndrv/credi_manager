<main class="content mt-3 px-5 py-4">
    <section class="container-fluid">
    <article class="mb-4">
            <p><span class="fw-light fs-4">CrediManager / </span><span class="fw-bold fs-4">Consultas</span></p>
        </article>
        <article class="card border-0">
            <div class="card-header">
                <h5 class="card-title fw-bold">
                    Lista de consultas
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row">

                    <div class="col-lg-5 mb-4">
                        <form id="form_consultas">
                            <input type="text" class="form-control" id="c-dni" name="c-dni" placeholder="Ingrese un DNI">
                    </div>
                    <div class="col-lg-5 mb-4">
                        <select class="form-select" name="c-campana" id="c-campana">
                            <option value="0">Estado de campaña</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        </form>
                    </div>
                    <!-- <div class="col-lg-12 d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-warning px-5 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Agregar
                        </button>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Dni</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Campaña</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="listar_consultas">
                                    <tr>
                                        <td colspan="6" class="text-center">No hay datos...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>


<!-- Modal -->
<div class="modal fade" id="editar-consulta" tabindex="-1" aria-labelledby="editar-consultaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editar-consultaModalLabel">Transladar a Ventas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formObtenerBase">
                    <input type="hidden" name="option" value="agregar_ventas">
                    <input type="hidden" name="id" id="id2">
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" id="estado" name="estado" value="Pendiente">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI:</label>
                                <input type="text" class="form-control" id="dni2" name="dni" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular:</label>
                                <input type="text" class="form-control" id="celular2" name="celular" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="tem" class="form-label">TEM:</label>
                                <input type="text" class="form-control" id="tem" name="tem" aria-describedby="emailHelp" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="credito_max" class="form-label">Credito:</label>
                                <input type="text" class="form-control" id="credito_max" name="credito" value="0.000">
                            </div>
                            <div class="mb-3">
                                <label for="linea" class="form-label">Linea:</label>
                                <input type="text" class="form-control" id="linea" name="linea" value="0.000">
                            </div>
                            <div class="mb-3">
                                <label for="plazo_max" class="form-label">Plazo:</label>
                                <select class="form-select" name="plazo" id="plazo_max">
                                    <option selected>Plazo</option>
                                    <option value="00">0</option>
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                    <option value="48">48</option>
                                    <option value="72">72</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_producto" class="form-label">Producto:</label>
                                <select class="form-select" name="tipo_producto" id="tipo_producto">
                                    <option value="0">Producto</option>
                                    <option value="LD">LD</option>
                                    <option value="TC">TC</option>
                                    <option value="LD/TC">LD/TC</option>
                                </select>
                            </div>
                        </div>
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