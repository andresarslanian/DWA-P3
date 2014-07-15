@extends('_master')

@section('title')
Users
@stop



@section('content')

<div class="row">
	<nav class="navbar navbar-default navbar-fixed-top"> 

		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
					<span>
						Menu
					</span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="#" class="home">Welcome</a></li>
					<li><a href="#" class="generate">Generate</a></li>
					<li><a href="#" class="faq">FAQ</a></li>
					<li><a href="#" class="about">About</a></li>
				</ul>
			</div>
		</div>


	</nav>
	<div id="home" class="col-xs-12 main-title">
		<div class="container-fluid">
			<div class="center">
				<h1> Welcome to the xkcd Password Generator </h1>
				<h3> Ready to the ultimate experience?</h3>
			</div>	
			<img alt="xkcd joke" src="./images/xkcd_password.png" class="col-xs-offset-3 img-thumbnail">
		</div>

	</div>
	<div id="generate" class="col-xs-12">
		<div class="container-fluid">
			<div class="center">
				<h1> Generate! </h1>
			</div>
			<div class="center alert alert-info" role="alert">
				{{$password}}
			</div>	
			<div class="col-xs-4 col-xs-offset-4">
				<form class="form-horizontal" role="form" action="/password" method="POST">
					<input type="hidden" value="false" name="first_time">
					<div class="form-group">
						<label for="words" class="col-xs-6 control-label"># Words</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" value="{{isset($customization['words'])? $customization['words']:'3'}}" max="9" min="1" id="words" name="words">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4">
							<div class="checkbox" >
								<label>
									<input type="checkbox" name="symbol"  @if ( isset($customization['symbol']) && $customization['symbol'])  checked @endif > Add symbol
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="number"  @if ( isset($customization['number']) && $customization['number'])  checked @endif > Add number
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="capital"  @if ( isset($customization['capital']) && $customization['capital'])  checked @endif > All capital
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="first_capital"  @if ( isset($customization['first_capital']) && $customization['first_capital'])  checked @endif > First Letter Capital
								</label>
							</div>
						</div>
					</div>						
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="camel_case"  @if ( isset($customization['camel_case']) && $customization['camel_case'])  checked @endif > Camel Case
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="center">
							<button type="submit" class="btn btn-info">Generate!</button>
						</div>
					</div>
				</form>									

			</div>
		</div>

	</div>			
	<div id="faq" class="col-xs-12">
		<div class="center">
			<h1> FAQ </h1>
		</div>
		<div class="col-xs-8 col-xs-offset-2">
			<p>Welcome the world's most secure password generators. Here you'll find the most common questions and answers, we hope it helps!</p>
			<br>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								So what's this?
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
							xkcd passowords are the most secure way of generating a password that is very very hard to hack and at the same time is very easy for you to remember!
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								Where to start?
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse">
						<div class="panel-body">
							It's simple: select the amount of words you would like your password to have, and click on the generate button (it's that easy!)
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								Options
							</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse">
						<div class="panel-body">
							You have some options to make the password even harder to hack such as adding symbols, numbers, capitals and all sort of perks to your password
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
								Still with doubts?
							</a>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">
							Read more about xkcd passwords in Wikipedia (they are always right :) ) <a href="http://en.wikipedia.org/wiki/Xkcd" title="Wikipedia" target="_blank">by clicking here.</a>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
								Suggestion
							</a>
						</h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">
							A small suggestion of us is once the password is generated, remember to write it down so as not to forget it ;)!
						</div>
					</div>
				</div>

			</div>	
		</div>




	</div>

	<div id="about" class="col-xs-12">
		<div class="center">
			<h1> About </h1>
			<br>
			<img alt="My picture!" src="{{URL::asset('/images/me2.png')}}" class="img-thumbnail">
		</div>
		<br>
		<br>
		<div class="center">
			Design and coded for DWA Project 2, by Andres Arslanian. I hope you like it! :)
		</div>
		<br>
		<br>
	</div>
</div>

@stop

@section('body')
	<script>
		$(document).ready(function() {
			
			var location = "<?php echo isset($_POST['first_time']) ? $_POST['first_time'] : '';?>"; 
			if (location){
				$('html, body').animate({
					scrollTop: $("#generate").offset().top
				}, 0);
			} else {
				$('html, body').animate({
					scrollTop: $("#home").offset().top
				}, 10);
			}
			
			$('.navbar a').click(function(){
				var c = $(this).attr('class');
				$('html, body').animate({
					scrollTop: ($("#"+c).offset().top)
				}, 1000);
				return false;
			});
		});
	</script>
@stop
