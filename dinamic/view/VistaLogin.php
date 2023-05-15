<script src="dinamic/view/js/login.js" type="text/javascript"></script>
<link rel="stylesheet" href="dinamic/view/css/login.css">

<?php
class VistaLogin {

    public function iniciarSesion() {
    ?>
        <div id="mensaje" class="text-center text-danger"></div>
        <div class="contenedor">
            <div class="text-center mt-3">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="form-floating mb-3" id="campoUsuario">
                            <input type="email" class="form-control" placeholder="name@example.com" id="sesionUsuario">
                            <label for="floatingInput">Usuario ejemplo@aulavirtual.umar.mx </label>
                            <div class="text-center text-danger" id="sinUsuarioLogin" style="display: none;">
                                Nombre de usuario no proporcionado. Inténtelo nuevamente
                            </div>
                            <div class="text-center text-danger" id="usuarioInvalidoLogin" style="display: none;">
                                El usuario ingresado no cumple con el formato establecido. Verifique su usuario
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class=" col-md-12">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="passUsuario" placeholder="Contraseña">
                            <label for="floatingInput">Contraseña</label>
                            <div class="text-center text-danger" id="sinContrasenaLogin" style="display: none;">
                                Contraseña no proporcionada. Inténtelo nuevamente
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-12 ">
                        <button class="btn btn-primary" type="button" onclick="validarUsuario('sesion','validarSesion');">Iniciar sesión</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-12">
                        <button class="btn btn-primary" type="button" onclick="cargarModal('dinamic/controller/Login.php','preregistro','Pre-registro');">Preregistro</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class=" col-md-12">
                        <a type="button" href="#" onclick="cargarModal('dinamic/controller/Login.php','recuperarContrasenia','Recuperar contraseña');">¿Olvidaste
                            tu contraseña? </a>
                    </div>
                </div>
            </div>
            <div class="d-none d-sm-none d-md-block text-center mt-3">
                <img src="dinamic/view/images/logoUmar.png" height="230px">
            </div>
        </div>
    <?php
    }

    public function preregistro() {
    ?>
    <h6 class="text-center">
        Formulario de registro de la Universidad del Mar
    </h6>
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-sm-6 text-center">
                <label for="selectUsuarioPreregistro" class="form-label">Usuario</label>
                <select class="form-select" id="selectUsuarioPreregistro" aria-label="Default select example">
                    <option selected disabled>Seleccionar un usuario</option>
                    <option value="Alumno">Alumno</option>
                    <option value="Revisor">Revisor</option>
                </select>
            </div>
        </div>
        <h5 id="mensaje_preAl" class="text-center text-danger"></h5>
        <div id="tipoUsuario"></div>
            <!-- Aqui estaban los formularios-->
            <?php
            is_file("view/FormularioUsuarios.php") ? include ("view/FormularioUsuarios.php") : include ("../view/FormularioUsuarios.php");
        ?>
    </div>
    <?php
    }

    public function recuperarContrasenia(){
    ?>
        <!--Div formulario recuperar contraseña-->
        <div class="container">

            <div class="row">
                <div class="mb-3">
                    <label class="">Te enviaremos un email con instrucciones sobre como restablecer tu contraseña.
                    </label>
                    <label class=""><b>Nota:</b> Es necesario que el correo proporcionado coincida con el que se haya
                        registrado.</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correoUsuario" placeholder="@aulavirtual.com.mx"/>
                    <div class="text-center text-danger" id="recuperarContraseniaSinCorreo" style="display: none;">
                        Ingrese su correo
                    </div>
                    <div class="text-center text-danger" id="recuperarContraseniaSinFormatoCorreo" style="display: none;">
                        El correo ingresado no cumple con el formato
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="content" class="col-lg-12" style="display:none;">
                    <div class="loading text-center"><img src="imagenes/loader.gif" alt="loading" /><br/>Se está procesando su solicitud. Espere un momento, por favor.</div>
                </div>
            </div>

            <div class="d-flex justify-content-evenly mt-3">
                <div>
                    <button type="button" class="btn btn-primary" onclick="validarCorreo('sesion','validarCorreo');">Enviar
                        email</button>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>

        </div>
    <?php
    }

}
?>
