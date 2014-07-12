@extends('_master')

@section('title')
Users
@stop



@section('content')

<div class="comment-list styled clearfix row col-sm-12">
	<br>
	<div class="col-lg-12"> <a href="/">← Home</a> </div>
	<br>
	<h1>Welcome to my random user generator!</h1>
	<form class="form-horizontal" role="form" method="POST" action='/user-generator'>
		<div class="form-group">
			<label for="users" class="col-sm-2 control-label">How Many Users?</label>
			<div class="col-sm-1">
				<input type="number" min=0 max=99 class="form-control" value="{{isset($_POST['users']) ? $_POST['users'] : '5'}}" name="users" id="users" placeholder="0-99">
			</div>
		</div>
		<div class="checkbox col-sm-offset-2">
		  <label>
		    <input type="checkbox" name="birthday" {{isset($_POST['birthday']) ? 'checked' : ''}} >
		    	Check to include birthday
		  </label>
		</div>	
		<div class="checkbox col-sm-offset-2">
		  <label>
		    <input type="checkbox" name="profile" {{isset($_POST['profile']) ? 'checked' : ''}} >
		    	Check to include profile info
		  </label>
		</div>
		<br>
		<input type='submit' value="Generate!" class="btn btn-info col-sm-offset-2">		
		<br>			
	</form>
	<ol class="col-sm-6 col-sm-offset-3">
		@if ( $error )
			<div class="well well-lg">{{$error}}</div>
		
		@else
			@foreach($users as $i => $user)
			<li class="comment">
				<div class="comment-body boxed">
					<div class="comment-arrow"></div>
					<div class="comment-avatar">
						<div class="avatar">
							<img src="{{$user[1].'people/'.$i%11}}" alt="" />
						</div>
					</div>
					<div class="comment-text">
						<div class="comment-author clearfix">
							<div class="link-author">{{$user[0]->name}}</div>
						</div>
						@if (isset($_POST['birthday']))				
							<div class="bd">
								{{$user[0]->dateTimeThisCentury->format('Y-m-d')}}
							</div>
						@endif	
						@if (isset($_POST['profile']))						
							<div class="comment-entry">
								{{$user[0]->text}}
							</div>
						@endif
					</div>
					<div class="clear"></div>
				</div>
			</li>
			@endforeach
		@endif
	</ol>
</div>


@stop