@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Article {{ $article->id }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/articles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/articles', $article->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Article',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">                             <tbody>
                            <tr>                                     <th>ID</th><td>{{ $article->id
                            }}</td>                                 </tr>
                            <tr><th> Articulo </th><td> {{ $article->articulo }} </td></tr><tr><th> Cod
                            Articulo </th><td> {{ $article->cod_articulo }} </td></tr><tr><th> Status
                        </th><td> @if(($article->status)=='0')
                        Inactivo                                 @else
                        Activo                                 @endif
                    </td></tr>                         </tbody>                     </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
