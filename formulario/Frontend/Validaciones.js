$(document).ready(function(){
	$("#pwd").blur(function(){
		if( !$("#pwd").val().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/) && $("#pwd").val() != ""){
			alert('Debe contener caracteres especiales [$, %, &, ?, ¡, ¿, !], numeros y mayusculas');
			$("#pwd").val('');
			$("b").eq(2).text("*) Contraseña incorrecta");
		}else{
			$("b").eq(2).text("*)");
		}
	});
	$("#Term").change(function(){
		if( $("#Term").prop("checked") ){
			$("#Enviar").attr("disabled",false);
		}else{
			$("#Enviar").attr("disabled",true);
		}
	});
	$("#pwdR").blur(function(){
		var pwd = $("#pwd").val();
		var pwdR = $("#pwdR").val();
		if(pwd != pwdR){
			alert('Contraseña diferente');
			$("#pwdR").val('');						
			$("b").eq(3).text("*) Contraseñas diferentes");
		}else{
			$("b").eq(3).text("*)");
			if(pwdR.length > 0 && pwd.length > 0)
				if( pwd.length < 10 ){
					$("#complejidad").attr('width','33%');
					$("#complejidad").text('Poco segura');
				}else if( pwd.length < 13 ){
					$("#complejidad").attr('width','66%');
					$("#complejidad").text('Segura');
				}else{
					$("#complejidad").attr('width','100%');
					$("#complejidad").text('Muy segura');
				}
		}
	});
	$("#email").blur(function(){
		if( !$("#email").val().match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && $("#email").val().length > 0){
			alert('Email incorrecta');
			$("#email").val('');
			$("b").eq(4).text("*) email incorrecta");
		}else{
			$("b").eq(4).text("*)");
		}
	});
	$("#Web").blur(function(){
		if( !$(this).val().match(/^(http?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/) && $(this).val() > 0 ){
			alert('Pagina web incorrecta');
			$(this).val('');
			$("b").eq(5).text("*) Pagina web incorrecta");
		}else{
			$("b").eq(5).text("*)");
		}
	});
	$("#Cedula").blur(function(){
		if( !$("#Cedula").val().match(/^[0-9]+$/) && $("#Cedula").val().length > 0){
			alert('Cedula incorrecta');
			$("#Cedula").val('');
			$("b").eq(6).text("*) Cedula incorrecta");
		}else{
			$("b").eq(6).text("*)");
		}
	});
	$("#NombreP").blur(function(){
		if( !$(this).val().match(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(7).text("*) Cedula incorrecta");
		}else{
			$("b").eq(7).text("*)");
		}
	});
	$("#NombreS").blur(function(){
		if( !$(this).val().match(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(7).text("*) Segundo nombre incorrecto");
		}else{
			$("b").eq(7).text("*)");
		}
	});
	$("#ApellidoP").blur(function(){
		if( !$(this).val().match(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(8).text("*) Primer apellido incorrecto");
		}else{
			$("b").eq(8).text("*)");
		}
	});
	$("#ApellidoS").blur(function(){
		if( !$(this).val().match(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(8).text("*) Segundo apellido incorrecto");
		}else{
			$("b").eq(8).text("*)");
		}
	});
	$("#Edad").blur(function(){
		if( $(this).val().length > 0 && ( !$(this).val().match(/^[0-9]+$/) || $(this).val() > 120 ) ){
			alert('Edad incorrecta');
			$(this).val('');
			$("b").eq(9).text("*) Edad incorrecta");
		}else{
			$("b").eq(9).text("*)");
		}
	});
	$("#TelefonoP").blur(function(){
		if( !$(this).val().match(/^[\d]{7,7}$/) && $(this).val().length > 0 ){
			alert('Numero incorrecto');
			$(this).val('');
			$("b").eq(10).text("*) Telefono Primario incorrecto");
		}else{
			$("b").eq(10).text("*)");
		}
	});
	$("#TelefonoS").blur(function(){
		if( !$(this).val().match(/^[\d]{7,7}$/) && $(this).val().length > 0 ){
			alert('Numero incorrecto');
			$(this).val('');
			$("b").eq(10).text("*) Telefono Secundario incorrecto");
		}else{
			$("b").eq(10).text("*)");
		}
	});
	$("#Municipio").blur(function(){
		if( !$(this).val().match(/^[\w\sñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(11).text("*) Municipio incorrecto");
		}else{
			$("b").eq(11).text("*)");
		}
	});
	$("#Ciudad").blur(function(){
		if( !$(this).val().match(/^[\w\sñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(12).text("*) Ciudad incorrecta");
		}else{
			$("b").eq(12).text("*)");
		}
	});
	$("#Direccion").blur(function(){
		if( !$(this).val().match(/^[\w\s,ñÑáéíóúÁÉÍÓÚ]+$/) && $(this).val().length > 0){
			alert('Solo caracteres');
			$(this).val('');
			$("b").eq(13).text("*) Direccion incorrecta");
		}else{
			$("b").eq(13).text("*)");
		}
	});

	$("form").submit(function(){
		if( $("#UserName").val().length == 0 || $("#NombreP").val().length == 0 || $("#NombreP").val().length == 0 || $("#Ciudad").val().length == 0 || $("#email").val().length == 0 || $("#Direccion").val().length == 0 || $("#pwd").val().length == 0 || $("#ApellidoP").val().length == 0 || $("#TelefonoP").val().length == 0 || $("#pwdR").val().length == 0 || $("#Edad").val().length == 0 ){
			alert('Faltan campos');
		}
		if( $("form").attr("novalidate") == "novalidate" || $("form").attr("novalidate") == true || $("form").attr("novalidate") ){
			alert('Hacket Alert');
			document.location = "index.php";
		}
	});

	$("#Estado").change(function(){
		var Estado = $(this).val();
		if(Estado != 0){
			$.post("CambMunicipio.php",{ Estado: Estado }, function(data){
				$("#Municipio").attr("disabled",false);
				$("#Municipio").html(data);
			});
		}else{
			$("#Municipio").attr("disabled",true);
		}
	});
	$("#Municipio").change(function(){
		var Municipio = $(this).val();
		if( Municipio != 0 ){
			$("#Ciudad").attr("disabled",false);
		}else{
			$("#Ciudad").attr("disabled",true);
			$("#Municipio").attr("disabled",true);
		}
	});
});