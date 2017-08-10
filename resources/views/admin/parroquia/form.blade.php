<div class="form-group {{ $errors->has('parroquia') ? 'has-error' : ''}}">
    {!! Form::label('parroquia', 'Parroquia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('parroquia', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('parroquia', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('iso') ? 'has-error' : ''}}">
    {!! Form::label('iso', 'Iso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('iso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('iso', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('canton_id') ? 'has-error' : ''}}">
    {!! Form::label('canton_id', 'Canton Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('canton_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('canton_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
