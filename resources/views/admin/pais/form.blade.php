<div class="form-group {{ $errors->has('pais') ? 'has-error' : ''}}">
    {!! Form::label('pais', 'Pais', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pais', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pais', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('iso') ? 'has-error' : ''}}">
    {!! Form::label('iso', 'Iso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('iso', null, ['class' => 'form-control']) !!}
        {!! $errors->first('iso', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
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
