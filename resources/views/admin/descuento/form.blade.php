<div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    {!! Form::label('valor', 'Valor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('valor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
{!! Form::label('status', 'Estado', ['class' => 'col-md-4 control-label']) !!}
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
