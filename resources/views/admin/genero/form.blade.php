<div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('genero', null, ['class' => 'form-control']) !!}
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
