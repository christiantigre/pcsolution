<div class="form-group {{ $errors->has('nom_pro') ? 'has-error' : ''}}">
    {!! Form::label('nom_pro', 'Nom Pro', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom_pro', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nom_pro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('app_pro') ? 'has-error' : ''}}">
    {!! Form::label('app_pro', 'App Pro', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('app_pro', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('app_pro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dir') ? 'has-error' : ''}}">
    {!! Form::label('dir', 'Dir', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dir', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('dir', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tlfn') ? 'has-error' : ''}}">
    {!! Form::label('tlfn', 'Tlfn', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tlfn', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tlfn', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_movi') ? 'has-error' : ''}}">
    {!! Form::label('cel_movi', 'Cel Movi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cel_movi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cel_movi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cel_claro') ? 'has-error' : ''}}">
    {!! Form::label('cel_claro', 'Cel Claro', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cel_claro', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cel_claro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
    {!! Form::label('fax', 'Fax', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('mail', 'Mail', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mail', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('web') ? 'has-error' : ''}}">
    {!! Form::label('web', 'Web', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('web', null, ['class' => 'form-control']) !!}
        {!! $errors->first('web', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ruc') ? 'has-error' : ''}}">
    {!! Form::label('ruc', 'Ruc', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ruc', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ruc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('representante') ? 'has-error' : ''}}">
    {!! Form::label('representante', 'Representante', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('representante', null, ['class' => 'form-control']) !!}
        {!! $errors->first('representante', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('actividad') ? 'has-error' : ''}}">
    {!! Form::label('actividad', 'Actividad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('actividad', null, ['class' => 'form-control']) !!}
        {!! $errors->first('actividad', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('logo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_pais') ? 'has-error' : ''}}">
    {!! Form::label('id_pais', 'Id Pais', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_pais', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_pais', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_provincia') ? 'has-error' : ''}}">
    {!! Form::label('id_provincia', 'Id Provincia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_provincia', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_provincia', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_canton') ? 'has-error' : ''}}">
    {!! Form::label('id_canton', 'Id Canton', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_canton', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_canton', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('status', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('status', '0', true) !!} No</label>
</div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('empresa') ? 'has-error' : ''}}">
    {!! Form::label('empresa', 'Empresa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('empresa', null, ['class' => 'form-control']) !!}
        {!! $errors->first('empresa', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ubicacion') ? 'has-error' : ''}}">
    {!! Form::label('ubicacion', 'Ubicacion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ubicacion', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ubicacion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('latitud') ? 'has-error' : ''}}">
    {!! Form::label('latitud', 'Latitud', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('latitud', null, ['class' => 'form-control']) !!}
        {!! $errors->first('latitud', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('longitud') ? 'has-error' : ''}}">
    {!! Form::label('longitud', 'Longitud', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('longitud', null, ['class' => 'form-control']) !!}
        {!! $errors->first('longitud', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
