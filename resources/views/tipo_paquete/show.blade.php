@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
	{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::$INPUT_TYPE$('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>
</div>
@endsection
