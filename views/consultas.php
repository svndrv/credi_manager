<main class="content mt-3 px-5 py-4">
    <section class="container-fluid">
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
                <h1 class="modal-title fs-5" id="editar-consultaModalLabel">Agregar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formActualizarConsulta">
                    <input type="hidden" name="option" value="actualizar_consulta">
                    <input type="hidden" name="id" id="id2">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni2" name="dni" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="celular" class="form-label">Celular:</label>
                        <input type="text" class="form-control" id="celular2" name="celular" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="campana" class="form-label">Campana:</label>
                        <select class="form-select" name="campana" id="campana2">
                            <option value="0">Estado de campaña</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
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