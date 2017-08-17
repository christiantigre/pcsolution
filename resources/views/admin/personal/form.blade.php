<div class="form-group {{ $errors->has('nom_per') ? 'has-error' : ''}}">
    {!! Form::label('nom_per', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom_per', null, ['class' => 'form-control', 'required' => 'required','autofocus'=>'autofocus']) !!}
        {!! $errors->first('nom_per', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('app_per') ? 'has-error' : ''}}">
    {!! Form::label('app_per', 'Apellido', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('app_per', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('app_per', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
    {!! Form::label('cedula', 'Cedula', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cedula', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pasaporte') ? 'has-error' : ''}}">
    {!! Form::label('pasaporte', 'Pasaporte', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pasaporte', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('pasaporte', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dir') ? 'has-error' : ''}}">
    {!! Form::label('dir', 'Dirección', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dir', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('dir', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tlfn') ? 'has-error' : ''}}">
    {!! Form::label('tlfn', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tlfn', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tlfn', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cel_movi') ? 'has-error' : ''}}">
    {!! Form::label('cel_movi', 'Movistar', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cel_movi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cel_movi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cel_claro') ? 'has-error' : ''}}">
    {!! Form::label('cel_claro', 'Claro', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cel_claro', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cel_claro', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('correo', 'Correo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mail', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fecha_nac') ? 'has-error' : ''}}">
    {!! Form::label('fnacimiento', 'F nacimiento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(empty($date2))

        {!! Form::text('fecha_nac',null,['id'=>'datepicker','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese fecha de nacimiento ...']) !!}
        
        @else

        {!! Form::text('fecha_nac',$date2,['id'=>'datepicker','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese fecha de nacimiento ...']) !!}

        @endif

        {!! $errors->first('fecha_nac', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    {!! Form::label('genro', 'Genero', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], 0 , ['id' =>'genero','class'=>'form-control']) }}

        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
    {!! Form::label('estado_civil', 'Estado Civil', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('estado_civil', [
        'Soltero(a)' => 'Soltero(a)', 
        'Unión de hecho' => 'Unión de hecho',
        'Casado(a)' => 'Casado(a)',
        'Divorciado(a)' => 'Divorciado(a)',
        'Viudo(a)' => 'Viudo(a)'
        ], 0 , ['id' =>'estado_civil','class'=>'form-control']) }}

        {!! $errors->first('estado_civil', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('hijos') ? 'has-error' : ''}}">
    {!! Form::label('hijos', 'Hijos', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('hijos', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hijos', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('id_pais') ? 'has-error' : ''}}">
    {!! Form::label('id_pais', 'Pais', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_pais', $paises, null,['placeholder'=>'Selecciona','id'=>'id_pais','class'=>'form-control','autofocus'=>'autofocus'])    !!}
        {!! $errors->first('id_pais', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('id_provincia') ? 'has-error' : ''}}">
    {!! Form::label('id_provincia', 'Provincia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
     {!! Form::select('id_provincia', $provincias, null,['placeholder'=>'Selecciona','id'=>'id_provincia','class'=>'form-control','autofocus'=>'autofocus'])    !!}
     {!! $errors->first('id_provincia', '<p class="help-block">:message</p>') !!}
 </div>
</div>
<div class="form-group {{ $errors->has('id_canton') ? 'has-error' : ''}}">
    {!! Form::label('id_canton', 'Canton', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_canton', $cantones, null,['placeholder'=>'Selecciona','id'=>'id_canton','class'=>'form-control','autofocus'=>'autofocus'])    !!}

        {!! $errors->first('id_canton', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('id_cargo') ? 'has-error' : ''}}">
    {!! Form::label('id_cargo', 'Cargo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
     {!! Form::select('id_cargo', $cargos, null,['placeholder'=>'Selecciona','id'=>'id_cargo','class'=>'form-control','autofocus'=>'autofocus'])    !!}

     {!! $errors->first('id_cargo', '<p class="help-block">:message</p>') !!}
 </div>
</div>
<div class="form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
    {!! Form::label('id_user', 'Id User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_user', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Estado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('status', '1', true) !!} Activo</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('status', '0') !!} Inactivo</label>
        </div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'Foto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="file" name="foto" id="foto" accept="image/*"  class="form-control"/>
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
