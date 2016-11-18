@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">TipoPaquetes</h1>
        {!! link_to_route('tipo-paquete.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($tipoPaquetes->isEmpty())
        <div class="well text-center">No TipoPaquetes found.</div>
    @else
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($tipoPaquetes as $tipoPaquete)
                <tr>
                    <td>{!! $tipoPaquete->nombre !!}</td>
                    <td>
                        {!! link_to_route('tipo-paquete.edit', 'Edit', [$tipoPaquete->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['tipo-paquete.destroy', $tipoPaquete->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this TipoPaquete?')",
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'margin-left:10px']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

    @include('common.paginate', ['records' => $tipoPaquetes])
</div>
@endsection