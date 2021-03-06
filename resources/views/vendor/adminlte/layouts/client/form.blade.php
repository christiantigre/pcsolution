<div class="box-body">

  <div class="form-group {{ $errors->has('nom_cli') ? 'has-error' : ''}}">
    {!! Form::label('nomcli','Nombre cliente',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('nom_cli',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese nombre del cliente ...']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('app_cli') ? 'has-error' : ''}}">
    {!! Form::label('appcli','Apellido cliente',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('app_cli',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese apellido del cliente ...']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('ci_cli') ? 'has-error' : ''}}">
    {!! Form::label('ci','DNI',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('ci_cli',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Identificación de cliente ...']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('ruc_cli') ? 'has-error' : ''}}">
    {!! Form::label('ruccli','Ruc Cliente',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('ruc_cli',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Razon social ...']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('fecha_nac') ? 'has-error' : ''}}">
    {!! Form::label('fechanac','F. nacimiento',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('fecha_nac',null,['id'=>'datepicker','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese fecha de nacimiento ...']) !!}
      </div>
    </div>
  </div> 

  <div class="form-group {{ $errors->has('dir') ? 'has-error' : ''}}">
    {!! Form::label('dirlocal','Dirección',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('dir',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Direccion de cliente ...']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('tlfn') ? 'has-error' : ''}}">
    {!! Form::label('telefono','Telefono',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('tlfn',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese numero de telefono...']) !!}
    </div>
  </div>
  
  <div class="form-group {{ $errors->has('cel') ? 'has-error' : ''}}">
    {!! Form::label('celular','Celular',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('cel',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese numero de celular...']) !!}
    </div>
  </div>                    

  <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('corrreo','Correo',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('mail',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese correo electronico...']) !!}
    </div>
  </div>       

  <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('estado','Estado',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      <select name="status" class="form-control">
        <option value="1">Activado</option>
        <option value="0">Desactivado</option>
      </select>
    </div>  
  </div>                    

  <div class="form-group"></div>
</div>