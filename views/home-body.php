<section class="container py-3 px-5 bg-white d-flex justify-content-center border-5 rounded-3 shadow-lg mb-5">
    <div class="row p-4">
        <div class="col-lg-12 mb-4 text-center">
            <h1>Ofrecemos</h1>
            <hr>
        </div>
        <div class="col-lg-4">
            <div class="card shadow" style="width: 23rem;">
                <img src="img/consulta/ld-cover.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Prestamos Personales</h5>
                    <p class="card-text">Préstamo personal en efectivo que te permite, mediante el pago de cuotas fijas al mes, utilizarlo para lo que desees.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow" style="width: 23rem;">
                <img src="img/consulta/unica-cover.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tarjeta de Crédito</h5>
                    <p class="card-text">Bono de bienvenida HASTA S/ 100 de devolución en tu primer consumo dentro de los 30 primeros días de activada la tarjeta.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width: 23rem;">
                <img src="img/consulta/aseso-cover.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Asesoria Financiera</h5>
                    <p class="card-text">Contactenos y le brindaremos ayuda para resolver cualquier duda acerca del rubro financiero y servicios que ofrecemos. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-3 px-5 bg-white d-flex justify-content-center border-5 rounded-3 shadow-lg mb-5" id="consulta-container">
    <div class="row p-2">
        <div class="col-lg-12 mb-3 text-center">
            <h1>Consulta tu Campaña</h1>
            <hr>
        </div>
        <div class="col-lg-4 col-sm-4 mb-3 text-center">
            <img src="img/consulta-img.png" class="card-img-top" style="width: 11rem;">
        </div>
        <div class="col-lg-8 col-sm-8 d-flex align-items-center">
            <form id="form_consulta" class="row" style="width: 30rem;">
                <input type="hidden" name="option" value="crear_consulta">
                <input type="hidden" id="campana"  name="campana">
                <div class="row mb-2 d-flex justify-content-center p-5">
                    <div class="mb-1">
                        <i class="icon fa-solid fa-address-card fa-md" style="color: #7c8185;"></i>
                        <input type="text" id="dni" class="form-control form-login-control" placeholder="Ingrese su DNI" name="dni">
                    </div>
                    <div class="mb-4">
                        <i class="icon fa-solid fa-phone fa-md" style="color: #7c8185;"></i>
                        <input type="text" id="celular" class="form-control form-login-control" placeholder="Ingrese su celular" name="celular">
                    </div>
                    <div class="mb-2">                        
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa una descripción (opcional)" rows="4"></textarea>
                    </div>
                    <div id="alerta"></div>
                    <div class="mt-3 fs-5">
                        <button id="verificar" type="submit" class="login-button btn w-100 fs-6 text-white">Consultar</button>
                    </div>
                    <div class="form-text">
                        <p class="fw-lighter">*Su consulta será almacenada en nuestros registros para futuras campañas.</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<section class="container py-3 px-5 bg-white d-flex justify-content-center border-5 rounded-3 shadow-lg mb-5">
    <div class="row p-4">
        <div class="col-lg-12 mb-4 text-center">
            <h1>Beneficios</h1>
            <hr>
        </div>
        <div class="col-lg-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img1.png" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img6.jpg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img2.png" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img5.jpg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img3.png" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width: 20rem;">
                <img src="img/guia-img4.jpg" class="card-img-top" alt="...">
            </div>
        </div>
    </div>

</section>

<section class="container py-3 px-5 bg-white d-flex justify-content-center border-5 rounded-3 shadow-lg mb-5">
    <div class="row p-4 text-center">
        <div class="col-lg-12 mb-4">
            <h1>Nosotros</h1>
            <hr>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow" style="width: 17rem;">
                <img src="img/acerca-img2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ética</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow" style="width: 17rem;">
                <img src="img/acerca-img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Compromiso</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow" style="width: 17rem;">
                <img src="img/acerca-img3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Compañerismo</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow" style="width: 17rem;">
                <img src="img/acerca-img4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Perseverancia</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-12 pt-5">
            <p>En alianza con <span id="credi">Credi</span><span id="scotia">Scotia</span>, nos enfocamos en mejorar la experiencia financiera de nuestros clientes.</p>
        </div>
    </div>

</section>

<!--              PARTE INFERIOR                -->
<div class="text-center pt-5">
        <h1>EMPRESAS QUE CONFIAN EN NOSOTROS</h1>
        <p class="text-secondary">Más de 300 empresas confian en nosotros y nuestros rigurosos procesos de selección</p>
</div>