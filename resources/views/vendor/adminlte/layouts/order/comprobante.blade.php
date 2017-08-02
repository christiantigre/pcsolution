<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href="cssOrden/orden.css" rel="stylesheet"/>

  <title>Orden</title>
  
</head>

<body>
  <header class="clearfix">  
  </header>
  @foreach($empresa as $dt_empres)
  <div class="logo">
    <img src="uploads/empresa/logo.png" height="100" alt="logo"/>
  </div>
  <br/>

  <span style="font-size:18px;"><strong>{{ $dt_empres->nom_local }}</strong></span><br/>
  <span style="font-size:18px;"><strong>{{ $dt_empres->nom_prop }}</strong></span><br/>

</span>
@endforeach
<footer class="footer">
  <center>

  </center>
</footer>
</body>

</html>
