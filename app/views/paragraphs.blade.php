

@extends('_master')

@section('title')
Paragraphs
@stop



@section('content')

<div class="comment-list styled clearfix row col-sm-12">
	<br>
	<div class="col-lg-12"> <a href="/">← Home</a> </div>
	<br>
	<h1>Welcome to my random paragraphs generator!</h1>
	<form class="form-horizontal" role="form" method="POST" action='/lorem-ipsum	'>
		<div class="form-group">
			<label for="paras" class="col-sm-2 control-label">How Many Paragraphs?</label>
			<div class="col-sm-1">
				<input type="number" min=0 max=99 class="form-control" value="{{isset($_POST['paras']) ? $_POST['paras'] : '5'}}" name="paras" id="paras" placeholder="0-99">
			</div>
		</div>
		<br>
		<input type='submit' value="Generate!" class="btn btn-info col-sm-offset-2">		
		<br>
		<br>			
	</form>
	<div class="col-sm-10 col-sm-offset-1">
		@if ( $error )
			<div class="well well-lg">{{$error}}</div>
		
		@else 
			@foreach($paragraphs as $i => $para)
				<div class="well well-lg">{{($i+1).'.-<br>'.$para}}</div>
			@endforeach
		 
		@endif
	</div>
</div>


@stop