@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Bancos</h1>
        {!! link_to_route('banco.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($bancos->isEmpty())
        <div class="well text-center">No Bancos found.</div>
    @else
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($bancos as $banco)
                <tr>
                    <td>{!! $banco->nombre !!}</td>
                    <td>
                        {!! link_to_route('banco.edit', 'Edit', [$banco->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['banco.destroy', $banco->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Banco?')",
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

    @include('common.paginate', ['records' => $bancos])
</div>
@endsection