<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- DataTables -->
<script src="{{ url ('plugins/jquery.dataTables.min.js') }}"  type="text/javascript"></script>
<script src="{{ url ('plugins/dataTables.bootstrap.min.js') }}"  type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>

<!-- bootstrap datepicker -->
<script src="{{ url ('/plugins/bootstrap-datepicker.js') }}"></script>

<script src="{{ url ('/js/scriptorder.js') }}"></script>

<script>
  	   //Date picker
  	   $('#datepicker').datepicker({
  	   	autoclose: true,
  	   	language: 'es',
  	   	dateFormat: 'dd-mm-yyyy',
  	   	format: 'dd-mm-yyyy'
  	   });
  	</script>

  	