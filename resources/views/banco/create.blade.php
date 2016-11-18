@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'banco.store', 'class' => 'form-horizontal']) !!}

        @include('banco.form')

    {!! Form::close() !!}
</div>
@endsection
