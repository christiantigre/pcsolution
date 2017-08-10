<div class="form-group {{ $errors->has('provincia') ? 'has-error' : ''}}">
    {!! Form::label('provincia', 'Provincia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('provincia', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('provincia', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('iso') ? 'has-error' : ''}}">
{!! Form::label('iso', 'Iso', ['class' => 'col-md-4 control-label']) !!}
<div class="col-md-6">
    {!! Form::text('iso', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('iso', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
    {!! Form::label('pais_id', 'Pais Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('pais_id', $country, null,['placeholder'=>'Selecciona','id'=>'id_marca','class'=>'form-control','autofocus'=>'autofocus'])    !!}
        {!! $errors->first('pais_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('status', '1', true) !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('status', '0') !!} No</label>
        </div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
