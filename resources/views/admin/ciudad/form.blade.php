<div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
    {!! Form::label('ciudad', 'Ciudad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ciudad', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
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
    {!! Form::select('provincia_id', $provincias, null,['placeholder'=>'Selecciona','id'=>'provincia_id','class'=>'form-control','autofocus'=>'autofocus'])    !!}
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
