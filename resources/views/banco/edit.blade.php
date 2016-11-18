@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($banco, ['route' => ['banco.update', $banco->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('banco.form')

    {!! Form::close() !!}
</div>
@endsection
