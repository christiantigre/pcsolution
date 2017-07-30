<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <title>Orden</title>
  
</head>

<body>
  <header class="clearfix">
    <h1>ORDEN DE TRABAJO</h1>    
  </header>
  @foreach($empresa as $dt_empres)
    <div class="logo">
      <img src="logo.png" height="100" alt="logo"/>
    </div>
    <br/>

    <span style="font-size:18px;"><strong>{{ $dt_empres->nom_local }}</strong></span><br/>

    </span>
    @endforeach
    <footer class="footer">
      <center>

      </center>
    </footer>
  </body>

  </html>
