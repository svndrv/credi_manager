<main class="content mt-3 px-5 py-4">
<section class="container-fluid">
        <article class="card border-0">
            <div class="card-body p-4">
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
        </article>
    </section>
    <section class="container-fluid">
        <article class="card border-0">
            <div class="card-header">
                <h5 class="card-title fw-bold">
                    Tabla de ventas
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <form id="form_filtro_base">
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese un DNI">
                    </div>
                    <div class="col-lg-3 mb-4">
                        <select class="form-select" name="c-campana" id="c-campana">
                            <option value="0">Estado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Desembolsado">Desembolsado</option>
                        </select>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <select class="form-select" name="c-campana" id="c-campana">
                            <option value="0">Producto</option>
                            <option value="LD">LD</option>
                            <option value="TC">TC</option>
                            <option value="LD/TC">LD/TC</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Dni</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Credito</th>
                                        <th scope="col">Linea</th>
                                        <th scope="col">Plazo</th>
                                        <th scope="col">TEM</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="listar_ventas">
                                    <tr>
                                        <td colspan="11" class="text-center">No hay datos...</td>
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