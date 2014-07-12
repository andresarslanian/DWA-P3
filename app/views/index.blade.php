@extends('_master')

@section('title')
Welcome 
@stop

@section('head')

@stop


@section('content')
<h1> Welcome to my Generator! </h1>
<blockquote>by Andres Arslanian</blockquote>

<div class="padded">
	<p>
		You'll be able to generate two type of things: paragraphs with random text or random users.
	</p>
	<p>
		For generating paragraphs you have 2 ways of doing so.
		<ul>
			<li>One is by clicking <a href='/lorem-ipsum'>here!</a>. This method will make a post to the server (this means that you can't control the magic).</li>
			<li>The other form is saying directly how many paragraphs you want. So for example, you could say '/lorem-ipsum/3'. This means that 3 paragraphs will be generated. The only rule is that numbers between 0 and 99 are valid... don't try to make tricks with other stuff rather than numbers :) </li>
		</ul>
	</p>
	<p>
		Similar for generating the users... you have 2 ways of doing so.
		<ul>
			<li>One is by clicking <a href='/user-generator'>here!</a>. This method will make a post to the server (this means that again, you can't control the magic).</li>
			<li>The other form is saying directly how many users you want to create. So for example, you could say '/user-generator/3'. This means that 3 users will be generated. </li>
		</ul>
	</p>	
	<p>
		Enjoy your stay!
	</p>
</div>
<footer class="col-lg-12">
	<a href='/lorem-ipsum'>Generate Text!</a> |
	<a href='/user-generator'>Generate Users!</a>

</footer>


@stop