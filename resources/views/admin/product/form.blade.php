<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('codbarra') ? 'has-error' : ''}}">
    {!! Form::label('codbarra', 'Codigo barra', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('codbarra', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('codbarra', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cant') ? 'has-error' : ''}}">
    {!! Form::label('cant', 'Cantidad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cant', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pre_com') ? 'has-error' : ''}}">
    {!! Form::label('pre_com', 'Precio Compra', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pre_com', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('pre_com', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pre_ven') ? 'has-error' : ''}}">
    {!! Form::label('pre_ven', 'Precio Venta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pre_ven', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('pre_ven', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
    {!! Form::label('img', 'Imagen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="file" name="img" id="img" accept="image/*"  class="form-control"/>
        {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prgr_tittle') ? 'has-error' : ''}}">
    {!! Form::label('prgr_tittle', 'Titulo pagina', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('prgr_tittle', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('prgr_tittle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nuevo') ? 'has-error' : ''}}">
    {!! Form::label('nuevo', 'Nuevo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('nuevo', '1') !!} Si</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('nuevo', '0', true) !!} No</label>
</div>
        {!! $errors->first('nuevo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('promocion') ? 'has-error' : ''}}">
    {!! Form::label('promocion', 'Promoción', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('promocion', '1') !!} Si</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('promocion', '0', true) !!} No</label>
</div>
        {!! $errors->first('promocion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('catalogo') ? 'has-error' : ''}}">
    {!! Form::label('catalogo', 'Catalogo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('catalogo', '1') !!} Si</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('catalogo', '0', true) !!} No</label>
</div>
        {!! $errors->first('catalogo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    {!! Form::label('is_active', 'Activo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('is_active', '1') !!} Si</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('is_active', '0', true) !!} No</label>
</div>
        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('articulo_id') ? 'has-error' : ''}}">
    {!! Form::label('articulo_id', 'Articulo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!--{!! Form::number('articulo_id', null, ['class' => 'form-control']) !!}-->
        {!! Form::select('articulo_id', $articulos, null,['placeholder'=>'Selecciona','id'=>'articulo_id','class'=>'form-control','autofocus'=>'autofocus'])    !!}
        {!! $errors->first('articulo_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
    {!! Form::label('marca_id', 'Marca', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!--{!! Form::number('marca_id', null, ['class' => 'form-control']) !!}-->
        {!! Form::select('marca_id', $marcas, null,['placeholder'=>'Selecciona','id'=>'marca_id','class'=>'form-control','autofocus'=>'autofocus'])    !!}
        {!! $errors->first('marca_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>