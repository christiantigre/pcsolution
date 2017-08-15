<div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('mail', 'Destinatario', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mail', null, ['class' => 'form-control','autofocus'=>'autofocus', 'required' => 'required']) !!}
        {!! $errors->first('nom_pro', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('asunto') ? 'has-error' : ''}}">
    {!! Form::label('asunto', 'Asunto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('asunto', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('asunto', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<textarea name="content" class="form-control my-editor">{!! old('content', $content) !!}</textarea>






<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Enviar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
