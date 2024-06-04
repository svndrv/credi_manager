<section id="s-consulta" class="container d-flex justify-content-center">
    
    <div class="card w-50">
        <div class="card-body ">
            <div class="row">
                    <div class="col-lg-12">
                        <form id="form_consulta" class="row">
                            <input type="hidden" name="option" value="crear_campanas">
                            <label for="dni" class="form-label">Ingrese su dni y celular</label>
                    </div>
            
                    <div class="row mb-2">
                        <div class="col-auto">
                            <label for="dni" class="visually-hidden">dni</label>
                            <input type="text" id="dni" class="form-control" placeholder="Ingrese su DNI" name="dni">
                        </div>
                        <div class="col-auto">
                            <label for="celular" class="visually-hidden">celular</label>
                            <input type="text" id="celular" class="form-control" placeholder="Ingrese su celular" name="celular">
                        </div>
                        <div class="col-auto">
                            <input type="hidden" id="campana" class="form-control" name="campana">
                        </div>
                    </div>
            
                    <div id="alerta">
            
                    </div>
            
                    <div class="col-auto">
                        <button id="verificar" type="submit" class="btn btn-primary mb-3">Consultar</button>
                    </div>
            
                    <div class="form-text">
                        Si desea mayor información ingrese <a href="">aqui</a>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>