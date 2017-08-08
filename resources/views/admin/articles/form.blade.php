<div class="form-group {{ $errors->has('articulo') ? 'has-error' : ''}}">
    {!! Form::label('articulo', 'Articulo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('articulo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('articulo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cod_articulo') ? 'has-error' : ''}}">
    {!! Form::label('cod_articulo', 'Cod Articulo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cod_articulo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cod_articulo', '<p class="help-block">:message</p>') !!}
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
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
