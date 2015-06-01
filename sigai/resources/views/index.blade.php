@extends('app')

@section('content')


@if (Auth::check() && Request::user()->hasRole('professor'))
    @include('home.professor')
@else

<div class="col-xs-12 col-sm-9">
	<div class="panel panel-default">
		<div class="panel-heading">Home</div>

		<div class="panel-body">
			Olá 
		</div>
	</div>
</div>
@endif

@endsection
