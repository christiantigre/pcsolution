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
 	document.getElementById("idcliente").value = id;
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
	
	