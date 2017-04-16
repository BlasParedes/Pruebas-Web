$(document).ready(function(){
	$(".eliminar").click(function(){
		$(this).parent('td').parent('tr').remove();
		var imagen = $(this).parent('td').parent('tr').find('.imagen').val();
		$.post('./ejecutar.php',{
			caso: 'eliminar',
			Id: $(this).attr('data-id'),
			Imagen: imagen
		},function(data){
			alert(data);
		});
	});
	$('.modificar').click(function(){		
		var nombre = $(this).parent('td').parent('tr').find('.nombre').val();
		var descripcion = $(this).parent('td').parent('tr').find('.descripcion').val();
		var precio = $(this).parent('td').parent('tr').find('.precio').val();
		$.post('./ejecutar.php',{
			caso: 'modificar',
			Id: $(this).attr('data-id'),
			Nombre: nombre,
			Descripcion: descripcion,
			Precio: precio
		},function(data){
			alert(data);
		});
	});
});