<main class="content mt-3 px-5 py-4">
    <div class="container-fluid">
    <article class="mb-4">
            <p><span class="fw-light fs-4">CrediManager / </span><span class="fw-bold fs-4">Metas</span></p>
        </article>
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title fw-bold">
                   Metas
                </h5>
            </div>
            <div class="card-body p-4">
                <form id="form_filtro_meta">
                    <div class="row">
                       <div class="col-lg-2">

                            <select class="form-select mb-4" aria-label="Default select example" id="id_usuario" name="id_usuario">
                                <option value=0>Seleccionar Usuario</option>
                                <option value=1>Administrador</option>
                                <option value=3>Asesor</option>
                            </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select" aria-label="Default select example" name="mes" id="mes">
                            <option value="0">Selecciona el mes</option>
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
                    <div class="col-lg-3">
                        <select class="form-select mb-4" aria-label="Default select example" id="cumplido" name="cumplido">
                            <option value="0">Seleccionar Cumplido</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>

                    </div>
                    
                    <div class="col-lg-2">
                       <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    </div>
                </div>
                    </form>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i>Agregar</button>
                    <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">LD Cantidad</th>
                            <th scope="col">LD Monto</th>
                            <th scope="col">TC Cantidad</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Cumplido</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="listar_metas">
                        <tr>
                            <td colspan="8" class="text-center">No hay datos</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="editar-metas" tabindex="-1" aria-labelledby="editar-metaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editar-metaModalLabel">Actualizar Meta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formActualizarMeta">
                    <input type="hidden" name="option" value="actualizar_meta">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="ld_cantidad" class="form-label">LD Cantidad:</label>
                        <input type="number" class="form-control" id="modal_ld_cantidad" name="ld_cantidad">
                    </div>
                    <div class="mb-3">
                        <label for="tc_cantidad" class="form-label">TC Cantidad:</label>
                        <input type="number" class="form-control" id="modal_tc_cantidad" name="tc_cantidad">
                    </div>
                    <div class="mb-3">
                        <label for="ld_monto" class="form-label">LD Monto:</label>
                        <input type="number" class="form-control" id="modal_ld_monto" name="ld_monto">
                    </div>
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario:</label>
                        <select class="form-select" name="id_usuario" id="modal_id_usuario">
                            <option value="0">Seleccionar usuario</option>
                            <option value="1">Administrador</option>
                            <option value="3">Asesor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mes" class="form-label">Mes:</label>
                        <select class="form-select" name="mes" id="modal_mes">
                            <option value="0">Seleccionar mes</option>
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
                    <div class="mb-3">
                        <label for="cumplido" class="form-label">Cumplido:</label>
                        <select class="form-select" name="cumplido" id="modal_cumplido">
                            <option value="0">Seleccionar estado</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                            <option value="Pendiente">Pendiente</option>
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
