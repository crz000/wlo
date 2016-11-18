@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($tipoPaquete, ['route' => ['tipo-paquete.update', $tipoPaquete->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('tipo_paquete.form')

    {!! Form::close() !!}
</div>
@endsection
