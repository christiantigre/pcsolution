<div class="form-group {{ $errors->has('nom_per') ? 'has-error' : ''}}">
    {!! Form::label('nom_per', 'Nom Per', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom_per', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nom_per', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('app_per') ? 'has-error' : ''}}">
    {!! Form::label('app_per', 'App Per', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('app_per', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('app_per', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('id_cargo') ? 'has-error' : ''}}">
    {!! Form::label('id_cargo', 'Id Cargo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cargo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_cargo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
    {!! Form::label('id_user', 'Id User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_user', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
