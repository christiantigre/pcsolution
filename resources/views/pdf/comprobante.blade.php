<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href="cssOrden/orden.css" rel="stylesheet"/>

  <title>Orden</title>
  
</head>

<body>
  <fieldset>
    <header class="clearfix">  
    </header>
    <table class="tabla">
      @foreach($empresa as $dt_empres)
      <caption>
        <fieldset class="fieldset_header">        
          <p>              
            <span class="right_span">
              <img src="uploads/empresa/logo.png" height="30" width="130" alt="logo"/><br/>
              <label class="header_label">{{ $dt_empres->slogan }}</label><br/>
            </span>
            <label class="header_label">{{ $dt_empres->area_especializacion }}</label>
            <label class="header_label">Gerente propietario :</label><label class="header_label">{{ $dt_empres->nom_prop }} {{ $dt_empres->app_prop }}</label>
            <label class="header_label">{{ $dt_empres->dir }}</label>
            <label class="header_label">{{ $dt_empres->mail }}</label>
            <label class="header_label">{{ $dt_empres->cel_movi }} / {{ $dt_empres->cel_claro }}
              <label class="header_label">{{ $dt_empres->tlfn }}</label>              
            </p>
          </fieldset>
        </caption>
        @endforeach
        <tbody>
          <tr><td>
            @foreach($orden as $or)
            <strong>ORDEN DE TRABAJO #{{ $or->num_secuencial }}</strong>
            @endforeach
          </td></tr>
          <tr class="border">          
            <td class="align_right">
              @foreach($orden as $or)
              <p>
                <strong>CLIENTE</strong>
                <label class="header_label">{{ $or->nomcli }} {{ $or->appcli }}</label><br/>
                <label class="header_label">{{ $or->tlfncli }} - {{ $or->celcli }}</label><br/>
                <label class="header_label">{{ $or->mailcli }}</label><br/>
              </p>
              @endforeach
            </td>
            <td class="align_center">
              @foreach($orden as $or)
              <p>              
                <strong>Fecha de recepción :</strong><label class="header_label">{{ $or->fecha_orden }}</label><br/>
                <strong>Fecha de revición :</strong><label class="header_label">{{ $or->fecha_reparacion }}</label><br/>
                <strong>Recaudo :</strong><label class="header_label">{{ $or->responsable }}</label><br/>
              </p>
              @endforeach
            </td>
            <td class="align_left">
              @foreach($orden as $or)
              <p>
                <strong>REGISTRO</strong>
                <label class="header_label">#{{ $or->num_secuencial }}</label><br/>
                <strong>Estado</strong><label class="header_label">{{ $or->estado->estado }}</label><br/>
                <label class="header_label">{{ $hoy }}</label><br/>
              </p>
              @endforeach
            </td>
          </tr>
          <tr>
            @foreach($orden as $or)
            <td colspan="1" rowspan="2">
              <p>
                <strong>Equipo</strong><label class="header_label">{{ $or->articulo->articulo }}</label><br/>
                <strong>Marca</strong><label class="header_label">{{ $or->marca->marca }}</label><br/>
                <strong>Modelo</strong><label class="header_label">{{ $or->modelo }}</label><br/>
                <strong>Serie</strong><label class="header_label">{{ $or->serie }}</label><br/>
              </p>
            </td>
            <td colspan="2" rowspan="1">
              <strong>Problema que reporta</strong><br/>
              <label class="header_label">{{ $or->problema_reportado }}</label>
            </td>
            @endforeach
          </tr>       
          <tr>
            @foreach($orden as $or)
            <td colspan="3">
              <strong>Notas</strong><br/>
              <label class="header_label">
                {{ $or->notas }}
              </label>
            </td>
            @endforeach
          </tr>
        </tbody>

      </table>
      <table class="t_frm_detall">
        <tbody>
          <tr>
            <td><center><label class="header_label firma"><hr class="hr_fr"/>Responsable :.......................................</label></center></td>
            <td><center><label class="header_label firma"><hr class="hr_fr"/>Cliente :.......................................</label></center></td>
            <td colspan="3">
              <table align="center">
                @foreach($orden as $tot)
                <tr>
                  <td><strong>Anticipo :</strong></td>
                  <td><label class="header_label firma">{{ number_format($tot->anticipo,2) }}</label></td>
                </tr>
                <tr>
                  <td><strong>Abono :</strong></td>
                  <td><label class="header_label firma">{{ number_format($tot->anticipo,2) }}</label></td>
                </tr>
                <tr>
                  <td><strong>Valor de reparación :</strong></td>
                  <td><label class="header_label firma">{{ number_format($tot->anticipo,2) }}</label></td>
                </tr>
                @endforeach              
              </table>
            </tr>
          </tbody>
        </table>

        <table class="tabla">
          <tr>
            <td colspan="3">
              <p>
                @foreach($clausulas as $clau)
                <label class="header_label_clausula">
                  *{{ $clau->clausula }}
                </label><br/>
                @endforeach
              </p>
            </td>
          </tr>
        </table>

        <span> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </span>

        <table class="tabla">        
          <tbody>
            <tr><td>
              @foreach($orden as $or)
              <strong>ORDEN DE TRABAJO #{{ $or->num_secuencial }}</strong>
              @endforeach
            </td></tr>
            <tr class="border">          
              <td class="align_right">
                @foreach($orden as $or)
                <p>
                  <strong>CLIENTE</strong>
                  <label class="header_label">{{ $or->nomcli }} {{ $or->appcli }}</label><br/>
                  <label class="header_label">{{ $or->tlfncli }} - {{ $or->celcli }}</label><br/>
                  <label class="header_label">{{ $or->mailcli }}</label><br/>
                </p>
                @endforeach
              </td>
              <td class="align_center">
                @foreach($orden as $or)
                <p>              
                  <strong>Fecha de recepción :</strong><label class="header_label">{{ $or->fecha_orden }}</label><br/>
                  <strong>Fecha de revición :</strong><label class="header_label">{{ $or->fecha_reparacion }}</label><br/>
                  <strong>Recaudo :</strong><label class="header_label">{{ $or->responsable }}</label><br/>
                </p>
                @endforeach
              </td>
              <td class="align_left">
                @foreach($orden as $or)
                <p>
                  <strong>REGISTRO</strong>
                  <label class="header_label">#{{ $or->num_secuencial }}</label><br/>
                  <label class="header_label">{{ $hoy }}</label><br/>
                </p>
                @endforeach
              </td>
            </tr>
            <tr>
              @foreach($orden as $or)
              <td colspan="1" rowspan="2">
                <p>
                  <strong>Equipo</strong><label class="header_label">{{ $or->id_articulo }}</label><br/>
                  <strong>Marca</strong><label class="header_label">{{ $or->id_marca }}</label><br/>
                  <strong>Modelo</strong><label class="header_label">{{ $or->modelo }}</label><br/>
                  <strong>Serie</strong><label class="header_label">{{ $or->serie }}</label><br/>
                </p>
              </td>
              <td colspan="2" rowspan="1">
                <strong>Problema que reporta</strong><br/>
                <label class="header_label">{{ $or->problema_reportado }}</label>
              </td>
              @endforeach
            </tr>       
            <tr>
              @foreach($orden as $or)
              <td colspan="3">
                <strong>Notas</strong><br/>
                <label class="header_label">
                  {{ $or->notas }}
                </label>
              </td>
              @endforeach
            </tr>
          </tbody>

        </table>
        <table class="t_frm_detall">
          <tbody>
            <tr>
              <td><center><label class="header_label firma"><hr class="hr_fr"/>Responsable :.......................................</label></center></td>
              <td><center><label class="header_label firma"><hr class="hr_fr"/>Cliente :.......................................</label></center></td>
              <td colspan="3">
                <table align="center">
                  @foreach($orden as $tot)
                  <tr>
                    <td><strong>Anticipo :</strong></td>
                    <td>{{ number_format($tot->anticipo,2) }}</td>
                  </tr>
                  <tr>
                    <td><strong>Abono :</strong></td>
                    <td>{{ number_format($tot->anticipo,2) }}</td>
                  </tr>
                  <tr>
                    <td><strong>Valor de reparación :</strong></td>
                    <td>{{ number_format($tot->anticipo,2) }}</td>
                  </tr>
                  @endforeach              
                </table>
              </tr>
            </tbody>
          </table>


          <footer class="footer">
            <center>

            </center>
          </footer>
        </fieldset>

      </body>

      </html>
