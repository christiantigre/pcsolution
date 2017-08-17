<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    {!! Form::label('cargo', 'Cargo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cargo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
{!! Form::label('status', 'Estado', ['class' => 'col-md-4 control-label']) !!}
<div class="col-md-6">
    <div class="checkbox">
        <label>{!! Form::radio('status', '1',true) !!} Yes</label>
    </div>
    <div class="checkbox">
        <label>{!! Form::radio('status', '0') !!} No</label>
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
</div><div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : ''}}">
{!! Form::label('departamento_id', 'Departamento', ['class' => 'col-md-4 control-label']) !!}
<div class="col-md-6">
    {!! Form::select('departamento_id', $departamento, null,['placeholder'=>'Selecciona','id'=>'departamento_id','class'=>'form-control','autofocus'=>'autofocus'])    !!}
    {!! $errors->first('departamento_id', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
