<div class="form-group {{ $errors->has('canton') ? 'has-error' : ''}}">
    {!! Form::label('canton', 'Canton', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('canton', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('canton', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : ''}}">
    {!! Form::label('provincia_id', 'Provincia Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('provincia_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
