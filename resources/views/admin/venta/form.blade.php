<div class="form-group {{ $errors->has('secuencial') ? 'has-error' : ''}}">
    {!! Form::label('secuencial', 'Secuencial', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('secuencial', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('secuencial', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('numerofactura') ? 'has-error' : ''}}">
    {!! Form::label('numerofactura', 'Numerofactura', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('numerofactura', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('numerofactura', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('claveacceso') ? 'has-error' : ''}}">
    {!! Form::label('claveacceso', 'Claveacceso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('claveacceso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('claveacceso', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    {!! Form::label('total', 'Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('total', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subtotal') ? 'has-error' : ''}}">
    {!! Form::label('subtotal', 'Subtotal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('subtotal', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('subtotal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valorconiva') ? 'has-error' : ''}}">
    {!! Form::label('valorconiva', 'Valorconiva', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('valorconiva', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('valorconiva', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valorsiniva') ? 'has-error' : ''}}">
    {!! Form::label('valorsiniva', 'Valorsiniva', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('valorsiniva', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('valorsiniva', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valorcondescuento') ? 'has-error' : ''}}">
    {!! Form::label('valorcondescuento', 'Valorcondescuento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('valorcondescuento', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('valorcondescuento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_venta') ? 'has-error' : ''}}">
    {!! Form::label('fecha_venta', 'Fecha Venta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_venta', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fecha_venta', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('responsable') ? 'has-error' : ''}}">
    {!! Form::label('responsable', 'Responsable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('responsable', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('responsable', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cantidad_items') ? 'has-error' : ''}}">
    {!! Form::label('cantidad_items', 'Cantidad Items', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cantidad_items', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cantidad_items', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_iva') ? 'has-error' : ''}}">
    {!! Form::label('id_iva', 'Id Iva', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_iva', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_iva', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_descuento') ? 'has-error' : ''}}">
    {!! Form::label('id_descuento', 'Id Descuento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_descuento', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_descuento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cliente') ? 'has-error' : ''}}">
    {!! Form::label('id_cliente', 'Id Cliente', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_cliente', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_vendedor') ? 'has-error' : ''}}">
    {!! Form::label('id_vendedor', 'Id Vendedor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_vendedor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_vendedor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
