<script src="dinamic/view/js/login.js" type="text/javascript"></script>

<button type="button" class="btn btn-primary mt-5 " data-bs-toggle="modal" data-bs-target="#modalLogin" onclick="cargarModal('dinamic/controller/Login.php','iniciarSesion','¡Bienvenido!');">Iniciar sesión</button>

<div class="modal fade" data-bs-backdrop = "static" tabindex="-1" id="modalLogin">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content modal-border ">
            <div class="modal-header ">
                <div></div>
                <div>
                    <h3 class="modal-title" id="titulo"></h3>
                </div>
                <div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
            </div>
            <div class="modal-body" id="cuerpo"></div>
        </div>
    </div>
</div>