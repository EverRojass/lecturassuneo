<?php $nombre="s" ?>

<!--div formulario de alumno-->
<div id="formularioAlumno" class="d-none">

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mt-2">
            <label>Nombre(s)</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preNombreAl"/>
            <div class="text-center text-danger" id="sinNombre" style="display: none;">
                Ingrese un nombre
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-2">
            <label>Apellido paterno</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preApellidoPAl" />
            <div class="text-center text-danger" id="sinApellidoPaterno" style="display: none;">
                Ingrese su apellido paterno
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-2">
            <label>Apellido materno</label >
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preApellidoMAl" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-6 mb-2">
            <label for="selectNSemestre" class="form-label" >Campus</label>
            <select class="form-select" id="selectCampus" aria-label="Default select example" onChange="select()" >
            <option value="0" selected disabled>Seleccione el campus</option>
            </select>
            <div class="text-center text-danger" id="sinCampus" style="display: none;">
                Seleccione un campus
            </div>
        </div>
        <div class="col-12 col-lg-6" id="comboCarrera" >
            <label for="selectNSemestre" class="form-label" >Carrera</label>
            <select class="form-select" id="selectCampus" aria-label="Default select example" onChange="select()" >
            <option value="0" selected disabled>Seleccione la Carrera</option>
            </select>
            <div class="text-center text-danger"  style="display: none;">
                Seleccione un campus
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-6 mb-2">
            <label >Número de semestre</label >
            <select class="form-select" value="<?=$numeroSemestre?>" id="preSemAl" aria-label="Default select example">
            <option selected disabled>Semestre</option>
            <?php 
            for ($i = 1; $i <= 10; $i++) {
                if($i==$numeroSemestre){
                echo "<option value='".$i."' selected>".$i."</option>";
                }else{
                echo "<option value='".$i."' >".$i."</option>";
                }
            }
            ?>
            </select>
            <div class="text-center text-danger" id="sinSemestre" style="display: none;">
                Seleccione el número de semestre
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-2">
            <label >Letra de grupo</label>
            <select class="form-select" id="preSemLetraAl" aria-label="Default select example">
            <option selected disabled>Seleccionar el grupo</option>
            <option value="A">A</option>
            <option value="B">B</option>
            </select>
            <div class="text-center text-danger" id="sinGrupo" style="display: none;">
                Seleccione la letra de su grupo
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-6">
            <label for="exampleNombre" class="form-label">Matricula</label>
            <input type="text" value="<?=$nombre?>" class="form-control" id="preMatriculaAl"/>
            <div class="text-center text-danger" id="sinMatricula" style="display: none;">
                La matricula ingresada no cumple con el formato
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <label for="exampleNombre" class="form-label">CURP</label>
            <input type="text" value="<?=$nombre?>" class="form-control" id="preCurpAl"/>
            <div class="text-center text-danger" id="sinCurp" style="display: none;">
                La curp ingresada no cumple con el formato
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="exampleInputEmail1" class="form-label">Correo</label>
            <input type="email" value="<?=$nombre?>" class="form-control" id="preCorreoAl" placeholder="@aulavirtual.com.mx"/>
            <div class="text-center text-danger" id="sinCorreo" style="display: none;">
            Ingrese su correo
            </div>
            <div class="text-center text-danger" id="sinFormatoCorreo" style="display: none;">
            El correo ingresado no cumple con el formato
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-evenly">
        <div class="text-center">
            Si la contraseña no será modificada no es necesario volver a rellenar estos campos
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-12 col-lg-6 mt-2">
            <label for="exampleInputPassword1" class="form-label" >Contraseña</label >
            <input type="password" class="form-control" id="prePassAl_1" onkeyup="validarCampo(event, this.id, 'sinContrasena');"/>
        </div>
        <div class="col-12 col-lg-6 mt-2">
            <label>Repetir contraseña</label>
            <input type="password" class="form-control mt-2" id="prePassAl_2" onkeyup="validarCampo(event, this.id, 'sinContrasena');"/>
        </div>
        <div class="text-center text-danger" id="sinContrasena" style="display: none;">
            Ingrese una Contraseña
        </div>
        <div class="text-center text-danger" id="contrasenaDiferente" style="display: none;">
            Verifique que las Contraseñas coincidan
        </div>
        <div class="text-center text-danger" id="contrasenaInvalida" style="display: none;">
            La contraseña debe tener al menos 8 caracteres
        </div>
    </div>
    <div class="d-flex justify-content-evenly">
        <div>
            <button type="button" class="btn btn-primary" onclick="validarDatosAlumno('bd/baseDatosAlumno.php?op=insertAlumnoPre','');">Preregistro</button>
        </div>
        <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >
            Cancelar
            </button>
        </div>
    </div>
</div>

<!-- revisor -->
<div id="formularioRevisor" class="d-none">

    <div class="row mb-2">
        <div class="col-12 col-lg-4 mt-2">
            <label>Nombre(s)</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preNombreRv"/>
            <div class="text-center text-danger" id="sinNombreRevisor" style="display: none;">
                Ingrese un nombre
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-2">
            <label >Apellido paterno</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preApellidoPRv" />
            <div class="text-center text-danger" id="sinApellidoRevisor" style="display: none;">
                Ingrese su apellido paterno
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-2">
            <label>Apellido materno</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2" id="preApellidoMRv" />
        </div>
    </div>
    
    <div class="row mb-2 ">
        <div class="col-12 col-lg-6">
            <label>Curp</label>
            <input type="text" value="<?=$nombre?>" class="form-control mt-2 mb-2" id="preCurpRv"/>
            <div class="text-center text-danger" id="curpInvalidaRevisor" style="display: none;">
                La curp ingresada no cumple con el formato
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <label for="exampleSelectCampus" class="form-label">Campus</label>
            <select class="form-select" id="selectCampusRv" aria-label="Default select example">
            <option value="0" selected disabled>Seleccionar campus</option>
            </select>
            <div class="text-center text-danger" id="sinCampusRevisor" style="display: none;">
                Seleccione un campus
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <label>Correo</label>
            <input type="email" value="<?=$nombre?>" class="form-control mt-2" id="preCorreoRv" placeholder="@aulavirtual.com.mx" onkeyup="validarCampo(event, this.id, 'sinCorreoRevisor', 'revisor');"/>
            <div class="text-center text-danger" id="sinCorreoRevisor" style="display: none;">
                Ingrese su correo
            </div>
            <div class="text-center text-danger" id="correoInvalidoRevisor" style="display: none;">
                El correo ingresado no cumple con el formato
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-evenly mt-3 mb-2">
        <div class="text-center">
            Si la contraseña no sera modificada no es necesario volver a rellenar estos campos
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-12 col-lg-6 mt-2">
            <label >Contraseña</label>
            <input type="password" class="form-control mt-2" id="prePassRv_1" />
        </div>
        <div class="col-12 col-lg-6 mt-2">
            <label>Repetir contraseña</label>
            <input type="password" class="form-control mt-2" id="prePassRv_2"/>
        </div>
        <div class="text-center text-danger" id="sinContrasenaRevisor" style="display: none;">
            Ingrese una Contraseña
        </div>
        <div class="text-center text-danger" id="contrasenaDiferenteRevisor" style="display: none;">
            Verifique que las Contraseñas coincidan
        </div>
        <div class="text-center text-danger" id="contrasenaInvalidaRevisor" style="display: none;">
            La contraseña debe tener al menos 8 caracteres
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
      <div>
        <button type="button" class="btn btn-primary" onclick="validarDatosRevisor('bd/baseDatosAdmin.php?op=insertRevisorPre','');">Preregistro</button>
      </div>
      <div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>

</div>


