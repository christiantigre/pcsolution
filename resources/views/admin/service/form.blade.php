
<div class="form-group {{ $errors->has('codbarra') ? 'has-error' : ''}}">
    {!! Form::label('codbarra', 'Codigo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(empty($numbers))
        {!! Form::text('codbarra', null, ['class' => 'form-control']) !!}
        @else
        {!! Form::text('codbarra', $numbers, ['class' => 'form-control']) !!}
        @endif        
        {!! $errors->first('codbarra', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cant') ? 'has-error' : ''}}">
    {!! Form::label('cant', 'Cantidad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cant', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cant', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pre_com') ? 'has-error' : ''}}">
    {!! Form::label('pre_com', 'Pre. compra', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pre_com', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pre_com', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pre_ven') ? 'has-error' : ''}}">
    {!! Form::label('pre_ven', 'Pre. venta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pre_ven', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pre_ven', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
    {!! Form::label('img', 'Imagen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('img', null, ['class' => 'form-control']) !!}
        {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('prgr_tittle') ? 'has-error' : ''}}">
    {!! Form::label('prgr_tittle', 'Titulo servicio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('prgr_tittle', null, ['class' => 'form-control']) !!}
        {!! $errors->first('prgr_tittle', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nuevo') ? 'has-error' : ''}}">
    {!! Form::label('nuevo', 'Nuevo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('nuevo', '1', true) !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('nuevo', '0') !!} No</label>
        </div>
        {!! $errors->first('nuevo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('promocion') ? 'has-error' : ''}}">
    {!! Form::label('promocion', 'Promocion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('promocion', '1', true) !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('promocion', '0') !!} No</label>
        </div>
        {!! $errors->first('promocion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('catalogo') ? 'has-error' : ''}}">
    {!! Form::label('catalogo', 'Catalogo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('catalogo', '1', true) !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('catalogo', '0') !!} No</label>
        </div>
        {!! $errors->first('catalogo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    {!! Form::label('is_active', 'Is Active', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('is_active', '1', true) !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('is_active', '0') !!} No</label>
        </div>
        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
