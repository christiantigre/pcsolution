<div class="form-group {{ $errors->has('estadopago') ? 'has-error' : ''}}">
    {!! Form::label('estadopago', 'Estado pago', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('estadopago', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('estadopago', '<p class="help-block">:message</p>') !!}
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
