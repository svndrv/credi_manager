<main class="content-pages content px-5 py-4">
    <div class="container-fluid mt-3">
        <div class="card shadow bg-body-tertiar">
            <div class="card-header card-style-custom">
                <h5 class="card-title fw-bold p-1">
                    Fuerza de Ventas
                </h5>
            </div>
            <div class="card-body p-4">
                <form id="">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-select" aria-label="Default select example" name="" id="">
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
                            <select class="form-select mb-4" aria-label="Default select example" id="" name="">
                                <option value="0">Seleccionar Cumplido</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>

                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </form>
                <div class="col-lg-12 d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-warning px-5 text-white" data-bs-toggle="modal" data-bs-target="#agregar-metafv">
                        <i class="fa-solid fa-user-plus me-2"></i> Agregar
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">LD Cantidad</th>
                                <th scope="col">LD Monto</th>
                                <th scope="col">TC Cantidad</th>
                                <th scope="col">Sede</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cumplido</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="listar_metasfv">
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