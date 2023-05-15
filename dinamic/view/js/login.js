function cargarModal(ruta,operador,titulo) {
	$.ajax({
		url: ruta +"?op=" + operador,
		success: function(datos){     
			$("#cuerpo").html(datos);
			$("#titulo").html(titulo);
			let campoResultados = document.getElementById("tipoUsuario");
			let divFormularioRevisor = document.getElementById("formularioRevisor");
			let divFormularioAlumno = document.getElementById("formularioAlumno");
			let selectUsuario = document.getElementById("selectUsuarioPreregistro");
			
			if (selectUsuario != null) { 
			selectUsuario.addEventListener("change", (event) => {
				if (event.target.value == "Revisor") {
				campoResultados.innerHTML = divFormularioRevisor.innerHTML;
				$("#preNombreRv").focus();
				} else {
				campoResultados.innerHTML = divFormularioAlumno.innerHTML;
				$("#preNombreAl").focus();
				}
			});
			}
		}
	});
}

function validarUsuario(ruta,operador)
{
	var emailRegex = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var correo = $("#sesionUsuario").val();
	if($("#sesionUsuario").val() == "" || !emailRegex.test(correo)){
		$("#sesionUsuario").focus();
		if($("#sesionUsuario").val() == ""){
			$("#sinUsuarioLogin").css("display","inline");
		}else{
			$("#usuarioInvalidoLogin").css("display","inline");
		}
	}else if($("#passUsuario").val() == ""){
		$("#passUsuario").focus();
		$("#sinContrasenaLogin").css("display","inline");
	}else{
		var informacion = "&usuario=" + $("#sesionUsuario").val() + "&pass=" + $("#passUsuario").val();
		$.ajax({
			url: ruta +"?op=" + operador,
			type: "POST",
      		data: "submit=" + informacion,
			success: function(datos){ 
				$("#mensaje").html(datos);    
			}
		});
	}
}

/**
 * 
 * @param urlAl - url a la que se mandarán los datos una vez pasada por todas las validaciones
 * @param accion - sirve para validar contraseñas cuando se edita a un alumno
 * @param idAlumno - id del alumno que se editará si es el caso
 */
function validarDatosAlumno(urlAl, accion, idAlumno) {
	let validarCurp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let emailRegex = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	let validarMatricula = /^[0-9]{10}$/;
	let correo = $("#preCorreoAl").val();
	let curp = $('#preCurpAl').val();
	let matricula = $('#preMatriculaAl').val();
	let validarContra=accion;

	if ($('#preNombreAl').val().trim().length == 0) {
		$('#preNombreAl').val('');
		$("#preNombreAl").focus();
		$("#sinNombre").css("display","inline");
	} else if ($('#preApellidoPAl').val().trim().length == 0) {
		$('#preApellidoPAl').val('');
		$("#sinApellidoPaterno").css("display","inline");
		$("#preApellidoPAl").focus();	
	} else if ($('#selectCampus').val() == null) {
		$("#sinCampus").css("display","inline");
		$("#selectCampus").focus();
	} else if ($('#selectCarrera').val() == null) {
		$("#sinCarrera").css("display","inline");
		$("#selectCarrera").focus();
	} else if ($('#preSemAl').val() == null) {
		$("#sinSemestre").css("display","inline");
		$("#preSemAl").focus();
	}else if($('#preSemLetraAl').val() == null) {
		$("#sinGrupo").css("display","inline");
		$("#preSemLetraAl").focus();
	} else if (matricula.trim().length != 0 && !validarMatricula.test(matricula)) {
		$("#sinMatricula").css("display","inline");
		$("#preMatriculaAl").focus();
		$('#preMatriculaAl').val('');
	} else if (curp.trim().length != 0 && !validarCurp.test(curp)) {
		$("#sinCurp").css("display","inline");
		$("#preCurpAl").focus();
		$('#preCurpAl').val('');
	} else if ($('#preCorreoAl').val().trim().length == 0) {
		$("#sinCorreo").css("display","inline");
		$("#preCorreoAl").focus();
		$('#preCorreoAl').val('');
	} else if (!emailRegex.test(correo)) {
		$("#sinFormatoCorreo").css("display","inline");
		$("#preCorreoAl").focus();
	} else if ($('#prePassAl_1').val().trim().length == 0 && validarContra=="") {
		$("#sinContrasena").css("display","inline");
		$("#prePassAl_1").focus();
		$('#prePassAl_1').val('');
	} else if ($('#prePassAl_2').val().trim().length == 0 && validarContra=="") {
		$("#sinContrasena").css("display","inline");
		$("#prePassAl_2").focus();	
		$('#prePassAl_2').val('');
	} else if ($('#prePassAl_1').val() != $('#prePassAl_2').val() && validarContra=="") {
		$("#contrasenaDiferente").css("display","inline");
		$("#prePassAl_1").focus();
		$("#prePassAl_1").val("");
		$("#prePassAl_2").val("");
	} else if ($("#prePassAl_1").val().trim().length < 8 && validarContra=="") {
		$("#contrasenaInvalida").css("display","inline");
		$("#contrasenaDiferente").css("display","none");
		$("#prePassAl_1").focus();
		$("#prePassAl_1").val("");
		$("#prePassAl_2").val("");
	} else if ($('#prePassAl_1').val() != $('#prePassAl_2').val() && validarContra=="editar") {
		$("#contrasenaDiferente").css("display","inline");
		$("#prePassAl_1").focus();
		$("#prePassAl_1").val("");
		$("#prePassAl_2").val("");
	} else if ($("#prePassAl_1").val().trim().length < 8 && validarContra=="editar" && $('#prePassAl_1').val().trim().length > 0) {
		$("#contrasenaInvalida").css("display","inline");
		$("#contrasenaDiferente").css("display","none");
		$("#prePassAl_1").focus();
		$("#prePassAl_1").val("");
		$("#prePassAl_2").val("");
	}else {
			var informacionPre = "&nombre=" + $('#preNombreAl').val().trim() + "&apellidoP=" + $('#preApellidoPAl').val().trim() +
			"&apellidoM=" + $('#preApellidoMAl').val().trim() + "&curp=" + $('#preCurpAl').val() + "&matricula=" + 
			$('#preMatriculaAl') .val() + "&correo=" + $('#preCorreoAl').val().trim() + "&pass=" + $('#prePassAl_1').val().trim() + "&carrera=" + $('#selectCarrera').val() + "&semestre=" + $('#preSemAl').val() + "-" + $('#preSemLetraAl').val() + "&idAlumno=" + idAlumno;
			$.ajax({
				url: urlAl,
				type: "POST",
				data: "submit=" + informacionPre,
				success: function(datos){ 
					$("#modalEstandar").modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					actualizarTabla('tablaAdministradorAlumno', 'selectCampusAlRv', 'selectCarreraAlRe', 'selectGrupoAlRv','administrador','administrador','mostrarTablaAlumnos');
			}
		});
	} 
}
/**
 * 
 * @param urlAl - url a la que se mandarán los datos una vez pasada por todas las validaciones
 * @param accion - sirve para validar contraseñas cuando se edita a un revisor
 * @param idRevisor - id del revisor que se editará si es el caso
 */
function validarDatosRevisor(urlRV, accion, idRevisor) {
	let validarCurp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let emailRegex = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	let curp = $('#preCurpRv').val();
	let correo = $("#preCorreoRv").val();
	let validarContra=accion;
	
	if ($("#preNombreRv").val().trim().length == 0) {
		$('#preNombreRv').val('');
		$("#sinNombreRevisor").css("display","inline");
		$("#preNombreRv").focus();
	} else if ($("#preApellidoPRv").val().trim().length == 0) {
		$('#preApellidoPRv').val('');
		$("#sinApellidoRevisor").css("display","inline");
		$("#preApellidoPRv").focus();
	} else if (curp != '' && !validarCurp.test(curp)) {
		$("#curpInvalidaRevisor").css("display","inline");
		$("#preCurpRv").focus();
	} else if ($("#selectCampusRv").val() == null) {
		$("#sinCampusRevisor").css("display","inline");
		$("#selectCampusRv").focus();
	} else if($("#preCorreoRv").val().trim().length == 0) {
		$('#preCorreoRv').val('');
		$("#sinCorreoRevisor").css("display","inline");
		$("#preCorreoRv").focus();
	} else if (!emailRegex.test(correo)) {
		$("#correoInvalidoRevisor").css("display","inline");
		$("#preCorreoRv").focus();
	} else if ($("#prePassRv_1").val().trim().length == 0 && validarContra=="") {
		$("#sinContrasenaRevisor").css("display","inline");
		$("#prePassRv_1").focus();
		$("#prePassRv_1").val("");
	} else if ($("#prePassRv_2").val().trim().length == 0 && validarContra=="") {
		$("#sinContrasenaRevisor").css("display","inline");
		$("#prePassRv_2").focus();
		$("#prePassRv_2").val("");
	} else if ($("#prePassRv_1").val() != $("#prePassRv_2").val() && validarContra=="") {
		$("#contrasenaDiferenteRevisor").css("display","inline");
		$("#prePassRv_1").focus();
		$("#prePassRv_1").val("");
		$("#prePassRv_2").val("");
	} else if ($("#prePassRv_1").val().trim().length < 8 && validarContra=="") {
		$("#contrasenaInvalidaRevisor").css("display","inline");
		$("#contrasenaDiferenteRevisor").css("display","none");
		$("#prePassRv_1").focus();
		$("#prePassRv_1").val("");
		$("#prePassRv_2").val("");
	} else if ($("#prePassRv_1").val() != $("#prePassRv_2").val() && validarContra=="editar") {
		$("#contrasenaDiferenteRevisor").css("display","inline");
		$("#prePassRv_1").focus();
		$("#prePassRv_1").val("");
		$("#prePassRv_2").val("");
	} else if ($("#prePassRv_1").val().trim().length < 8 && validarContra=="editar" && $('#prePassRv_1').val().trim().length > 0) {
		$("#contrasenaInvalidaRevisor").css("display","inline");
		$("#contrasenaDiferenteRevisor").css("display","none");
		$("#prePassRv_1").focus();
		$("#prePassRv_1").val("");
		$("#prePassRv_2").val("");
	}else {
		var informacionPre2 = "&nombreRv=" + $('#preNombreRv').val().trim() + "-" + $('#preApellidoPRv').val().trim() + "-" + $('#preApellidoMRv').val().trim() + 
		"&curpRv=" + $('#preCurpRv').val() + "&correoRv=" + $('#preCorreoRv').val().trim() + "&passRv=" + $('#prePassRv_1').val().trim() + 
			"&campus=" + $('#selectCampusRv').val() + "&idRevisor=" + idRevisor;
			$.ajax({
				url: urlRV,
				type: "POST",
				data: "submit=" + informacionPre2,
				success: function(datos){ 
					$("#modalEstandar").modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					actualizarTabla('tablaAdministradorRevisor', 'selectCampusRvAd', 'selectCarreraAlRe', 'selectGrupoAlAd','administrador','administrador','mostrarTablaRevisor');
			}
		});
	}
}


