@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'tipo-paquete.store', 'class' => 'form-horizontal']) !!}

        @include('tipo_paquete.form')

    {!! Form::close() !!}
</div>
@endsection
