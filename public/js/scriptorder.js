 $(document).ready(function(){
 	document.getElementById("id_articulo").focus();
 });


 $(document).ready(function(){
 	$("#cisearchbuton").click(function(event){
 		event.preventDefault();
 		var dataId= $("#cicli").val();
 		var token = $("input[name=_token]").val();
 		var route = '/admin/client/buscar/';
 		var parametros = {
 			"id" :dataId
 		}
 		var dataSting = "id="+dataId;
 		if (dataId == "") {
 			alert('Ingrese datos de busqueda');
 			document.getElementById("cicli").focus();
 			return false;
 		}
 		$.ajax({
 			url:route,
 			headers:{'X-CSRF-TOKEN':token},
 			type:'get',
 			dataType: 'json',
 			data:parametros,
 			success:function(data)
 			{
 				document.getElementById("cicli").value = "";
 				document.getElementById("tabla").deleteRow(0);
 				console.log('Si '+data.id);
 				var contLin = 3;
 				var tr, td, tabla;
 				tabla = document.getElementById('tabla');
 				tr = tabla.insertRow(tabla.rows.length);
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = td.innerHTML = data.nom_cli+' '+data.app_cli+"<input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.mail+' '
 				+"<input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_cli+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_cli+"><input type='hidden' id='cicamp' name='cicamp' value="+data.ci_cli+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.cel+"<input type='hidden' id='dircamp' name='dircamp' value="+data.dir+"><input type='hidden' id='celcamp' name='celcamp' value="+data.cel+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.tlfn;
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
 				//type="button" class="btn btn-default pull-left" data-dismiss="modal"
 				contLin++;
 				//manageRow(data.data);onclick="window.close();"
 			},
 			error:function(data)
 			{
 				console.log('Error '+data);
 			}  
 		});
 	});
 });


 function seleccionar(){
 	var nom = document.getElementById("nomcamp").value;
 	var app = document.getElementById("appcamp").value;
 	var ci = document.getElementById("cicamp").value;
 	var id = document.getElementById("idcamp").value;
 	var cel = document.getElementById("celcamp").value;
 	var mail = document.getElementById("mailcamp").value;
 	var dircli = document.getElementById("dircamp").value;
 	document.getElementById("nom_cli").value = nom+' '+app;
 	document.getElementById("name_cli").value = nom;
 	document.getElementById("app_cli").value = app;
 	document.getElementById("ci_cli").value = ci;
 	document.getElementById("dir_cli").value = dircli;
 	document.getElementById("tlfn").value = cel;
 	document.getElementById("id_cliente").value = id;
 	document.getElementById("cel").value = cel;
 	document.getElementById("mail").value = mail;
 }

 $(document).ready(function(){
 	$("#nomsearchbuton").click(function(event){
 		event.preventDefault();
 		var dataId= $("#nomcli").val();
 		var token = $("input[name=_token]").val();
 		var route = '/admin/client/buscarpornombre/';
 		var parametros = {
 			"id" :dataId
 		}
 		var dataSting = "id="+dataId;
 		if (dataId == "") {
 			alert('Ingrese datos de busqueda');
 			document.getElementById("nomcli").focus();
 			return false;
 		}
 		$.ajax({
 			url:route,
 			headers:{'X-CSRF-TOKEN':token},
 			type:'get',
 			dataType: 'json',
 			data:parametros,
 			success:function(data)
 			{
 				document.getElementById("nomcli").value = "";
 				document.getElementById("tabla").deleteRow(0);
 				console.log('Si '+data.id);
 				var contLin = 3;
 				var tr, td, tabla;
 				tabla = document.getElementById('tabla');
 				tr = tabla.insertRow(tabla.rows.length);
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = td.innerHTML = data.nom_cli+' '+data.app_cli+"<input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.mail+' '
 				+"<input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_cli+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_cli+"><input type='hidden' id='cicamp' name='cicamp' value="+data.ci_cli+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.cel+"<input type='hidden' id='dircamp' name='dircamp' value="+data.dir+"><input type='hidden' id='celcamp' name='celcamp' value="+data.cel+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.tlfn;
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
 				//type="button" class="btn btn-default pull-left" data-dismiss="modal"
 				contLin++;
 				//manageRow(data.data);onclick="window.close();"
 			},
 			error:function(data)
 			{
 				console.log('Error '+data);
 			}  
 		});
 	});
 });


 $(document).ready(function(){
 	$("#mailsearchbuton").click(function(event){
 		event.preventDefault();
 		var dataId= $("#mailcli").val();
 		var token = $("input[name=_token]").val();
 		var route = '/admin/client/buscarpormail/';
 		var parametros = {
 			"id" :dataId
 		}
 		var dataSting = "id="+dataId;
 		if (dataId == "") {
 			alert('Ingrese datos de busqueda');
 			document.getElementById("mailcli").focus();
 			return false;
 		}
 		$.ajax({
 			url:route,
 			headers:{'X-CSRF-TOKEN':token},
 			type:'get',
 			dataType: 'json',
 			data:parametros,
 			success:function(data)
 			{
 				document.getElementById("mailcli").value = "";
 				document.getElementById("tabla").deleteRow(0);
 				console.log('Si '+data.id);
 				var contLin = 3;
 				var tr, td, tabla;
 				tabla = document.getElementById('tabla');
 				tr = tabla.insertRow(tabla.rows.length);
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = td.innerHTML = data.nom_cli+' '+data.app_cli+"<input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.mail+' '
 				+"<input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_cli+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_cli+"><input type='hidden' id='cicamp' name='cicamp' value="+data.ci_cli+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.cel+"<input type='hidden' id='dircamp' name='dircamp' value="+data.dir+"><input type='hidden' id='celcamp' name='celcamp' value="+data.cel+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+">";
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = data.tlfn;
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
 				//type="button" class="btn btn-default pull-left" data-dismiss="modal"
 				contLin++;
 				//manageRow(data.data);onclick="window.close();"
 			},
 			error:function(data)
 			{
 				console.log('Error '+data);
 			}  
 		});
 	});
 });

 $(document).ready(function(){
 	$("#save_abono").click(function(event){
 		event.preventDefault();
 		var idorden = $("#id").val();
 		var abono = $("#abono").val();
 		var articulo = $("#articulo").val();
 		var emitente = $("#emitente").val();
 		var datepicker = $("#datepicker").val();
 		var token = $("input[name=_token]").val();
 		var route = '/admin/orders/saveOrden/';
 		if (abono == ""){
 			alert('Ingrese valor de abono');
 			document.getElementById("abono").focus();
 			return false;
 		}
 		$.ajax({
 			url:route,
 			headers:{'X-CSRF-TOKEN':token},
 			type:'post',
 			dataType: 'json',
 			data:{
 				id: idorden,
 				abono: abono,
 				articulo:articulo,
 				emitente:emitente
 			},
 			success:function(data)
 			{
 				console.log('success '+data);
 				document.getElementById("tabla").deleteRow(0);
 				console.log('Si '+data.id);
 				var contLin = 3;
 				var tr, td, tabla;
 				tabla = document.getElementById('tablaAbono');
 				tr = tabla.insertRow(tabla.rows.length);
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = datepicker;
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = abono;
 				td = tr.insertCell(tr.cells.length);
 				td.innerHTML = emitente;
 				contLin++;
 			},
 			error:function(data)
 			{
 				console.log('Error '+data);
 			}  
 		});
 	});
 });
//guardaAbono();



$(document).ready(function(){
	$("#delete_abono").click(function(event){
		alert("eliminar");
		/*var id = $("#id_abono").val();
		var route = "/admin/abonos/delete/"+id+'';
		var token = $("#token").val();
		alert(route);
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'DELETE',
			dataType:'json',
			success: function(data){
				console.log("eliminado");
			},
			error:function(data)
			{
				console.log('Error '+data);
			} */
		});
});

$(document).ready(function(){
	$("#save_gatorepuesto").click(function(event){
		event.preventDefault();
		var idorden = $("#id").val();
		var valor = $("#valor").val();
		var repuesto = $("#repuesto").val();
		var token = $("input[name=_token]").val();
		var route = '/admin/repuestos/saveGasto/';
		if (valor == ""){
			alert('Ingrese valor del repuesto');
			document.getElementById("valor").focus();
			return false;
		}
		$.ajax({
			url:route,
			headers:{'X-CSRF-TOKEN':token},
			type:'post',
			dataType: 'json',
			data:{
				id: idorden,
				valor: valor,
				repuesto:repuesto
			},
			success:function(data)
			{
				console.log('success '+data);
				document.getElementById("tablaGastos").deleteRow(0);
				console.log('Si '+data.id);
				var contLin = 3;
				var tr, td, tabla;
				tabla = document.getElementById('tablaGastos');
				tr = tabla.insertRow(tabla.rows.length);
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = repuesto;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = valor;
				contLin++;
			},
			error:function(data)
			{
				console.log('Error '+data);
			}  
		});
	});
});
//buscar proveedor por ruc
$(document).ready(function(){
	$("#proveedorrucchbuton").click(function(event){
		event.preventDefault();
		var dataId= $("#rucprv").val();
		var token = $("input[name=_token]").val();
		var route = '/admin/products/buscaproveedorruc/';
		var parametros = {
			"id" :dataId
		}
		var dataSting = "id="+dataId;
		if (dataId == "") {
			alert('Ingrese datos de busqueda');
			document.getElementById("rucprv").focus();
			return false;
		}
		$.ajax({
			url:route,
			headers:{'X-CSRF-TOKEN':token},
			type:'get',
			dataType: 'json',
			data:parametros,
			success:function(data)
			{
				document.getElementById("rucprv").value = "";
				document.getElementById("tabla_proveedor").deleteRow(0);
				var contLin = 3;
				var tr, td, tabla;
				tabla = document.getElementById('tabla_proveedor');
				tr = tabla.insertRow(tabla.rows.length);
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = td.innerHTML = data.nom_pro+' '
				+data.app_pro+"<input type='hidden' id='celmovicamp' name='celmovicamp' value="+data.cel_movi+"><input type='hidden' id='celclarocamp' name='celclarocamp' value="+data.cel_claro+"><input type='hidden' id='empresacamp' name='empresacamp' value="+data.empresa+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_pro+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_pro+"><input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.cel_movi+' '+data.cel_claro;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.mail;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.empresa;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar_proveedor();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
				contLin++;
			},
			error:function(data)
			{
				console.log('Error '+data);
			}  
		});
	});
});
//buscar proveedor por nombre de empresa
$(document).ready(function(){
	$("#proveedorempchbuton").click(function(event){
		event.preventDefault();
		var dataId= $("#nompro").val();
		var token = $("input[name=_token]").val();
		var route = '/admin/products/buscaproveedorempresa/';
		var parametros = {
			"id" :dataId
		}
		var dataSting = "id="+dataId;
		if (dataId == "") {
			alert('Ingrese datos de busqueda');
			document.getElementById("rucprv").focus();
			return false;
		}
		$.ajax({
			url:route,
			headers:{'X-CSRF-TOKEN':token},
			type:'get',
			dataType: 'json',
			data:parametros,
			success:function(data)
			{
				document.getElementById("nompro").value = "";
				document.getElementById("tabla_proveedor").deleteRow(0);
				var contLin = 3;
				var tr, td, tabla;
				tabla = document.getElementById('tabla_proveedor');
				tr = tabla.insertRow(tabla.rows.length);
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = td.innerHTML = data.nom_pro+' '
				+data.app_pro+"<input type='hidden' id='celmovicamp' name='celmovicamp' value="+data.cel_movi+"><input type='hidden' id='celclarocamp' name='celclarocamp' value="+data.cel_claro+"><input type='hidden' id='empresacamp' name='empresacamp' value="+data.empresa+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_pro+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_pro+"><input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.cel_movi+' '+data.cel_claro;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.mail;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.empresa;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar_proveedor();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
				contLin++;
			},
			error:function(data)
			{
				console.log('Error '+data);
			}  
		});
	});
});
//buscar proveedor por mail
$(document).ready(function(){
	$("#proveedormailchbuton").click(function(event){
		event.preventDefault();
		var dataId= $("#mailpro").val();
		var token = $("input[name=_token]").val();
		var route = '/admin/products/buscaproveedormail/';
		var parametros = {
			"id" :dataId
		}
		var dataSting = "id="+dataId;
		if (dataId == "") {
			alert('Ingrese datos de busqueda');
			document.getElementById("rucprv").focus();
			return false;
		}
		$.ajax({
			url:route,
			headers:{'X-CSRF-TOKEN':token},
			type:'get',
			dataType: 'json',
			data:parametros,
			success:function(data)
			{
				document.getElementById("mailpro").value = "";
				document.getElementById("tabla_proveedor").deleteRow(0);
				var contLin = 3;
				var tr, td, tabla;
				tabla = document.getElementById('tabla_proveedor');
				tr = tabla.insertRow(tabla.rows.length);
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = td.innerHTML = data.nom_pro+' '
				+data.app_pro+"<input type='hidden' id='celmovicamp' name='celmovicamp' value="+data.cel_movi+"><input type='hidden' id='celclarocamp' name='celclarocamp' value="+data.cel_claro+"><input type='hidden' id='empresacamp' name='empresacamp' value="+data.empresa+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='mailcamp' name='mailcamp' value="+data.mail+"><input type='hidden' id='nomcamp' name='nomcamp' value="+data.nom_pro+"><input type='hidden' id='appcamp' name='appcamp' value="+data.app_pro+"><input type='hidden' id='idcamp' name='idcamp' value="+data.id+">";
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.cel_movi+' '+data.cel_claro;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.mail;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = data.empresa;
				td = tr.insertCell(tr.cells.length);
				td.innerHTML = "<button type='button' id='buscarcliente' onclick='seleccionar_proveedor();' data-dismiss='modal' class='btn btn-primary'>Seleccionar</button>";
				contLin++;
			},
			error:function(data)
			{
				console.log('Error '+data);
			}  
		});
	});
});


function seleccionar_proveedor(){
	var empresa = document.getElementById("empresacamp").value;
	var id = document.getElementById("idcamp").value;
	var nom = document.getElementById("nomcamp").value;
	var app = document.getElementById("appcamp").value;
	var mail = document.getElementById("mailcamp").value;
	var celmovi = document.getElementById("celmovicamp").value;
	var celclaro = document.getElementById("celclarocamp").value;
	document.getElementById("nom_pro").value = nom+ +app;
	document.getElementById("mail").value = mail;
	document.getElementById("proveedor_id").value = id;
	document.getElementById("empresa").value = empresa;
	document.getElementById("contactos").value = celmovi+' '+celclaro;
}

$('.select_cli').click(function(){
	var dataId = this.id;
	var token = $("input[name=_token]").val();
	var route = '/admin/extraerdatoscli/';
	var parametros = {
		"id" :dataId
	}
	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'get',
		dataType: 'json',
		data:parametros,
		success:function(data)
		{
			//data.cel_movi
			console.log(data.id);
			document.getElementById("cliente_name").value = data.nom_cli+' '+data.app_cli;
			document.getElementById("ci_ruc").value = data.ci_cli+' '+data.ruc_cli;
			document.getElementById("tlfn_cliente").value = data.tlfn+' '+data.cel;
			document.getElementById("dir_cli").value = data.dir;
			document.getElementById("email_cliente").value = data.mail;
			document.getElementById("id_cliente").value = data.id;
		},
		error:function(data)
		{
			console.log('Error '+data);
		}  
	});
});

$('.select_prod').click(function(){
	var dataId = this.id;
	var token = $("input[name=_token]").val();
	var route = '/admin/venta/addItem/';	
	var id = $(this).parents("tr").find("td")[0].innerHTML;
	var nombre = $(this).parents("tr").find("td")[1].innerHTML;
	var codbarra = $(this).parents("tr").find("td")[2].innerHTML;
	var precio = $(this).parents("tr").find("td")[3].innerHTML;
	var cantidad = $(this).parents("tr").find('#cantidad').val();
	//console.log(nombre);
	var parametros = {
		"id" :dataId,
		"idproducto" :id,
		"nombre" :nombre,
		"codbarra" :codbarra,
		"precio" :precio,
		"cantidad" :cantidad
	}
	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN':token},
		type:'post',
		dataType: 'json',
		data:parametros,
		success:function(data)
		{
			console.log('correcto '+data);
			items_cart();	
		},
		error:function(data)
		{
			console.log('Error '+data);
		}  
	});
});

$(document).ready(function(){
	$.ajax({
		type:'get',
		url:'/admin/listcartitems/',
		success: function(data){
			$('#list-cart').empty().html(data);
		}
	});
});

function items_cart(){
	$.ajax({
		type:'get',
		url:'/admin/listcartitems/',
		success: function(data){
			$('#list-cart').empty().html(data);
		}
	});
}
