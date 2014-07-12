<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});


Route::get('/user-generator/{users?}', function($users=0)
{
	$users_array = [];

	if ($users > 99)
		$users = 99;

	if ($users < 0)
		$users = 0;	

	$error = false;
	if (!is_numeric($users))
		$error = "Sorry! But I only understand numbers and you ask me for '$users' users! What's that?";


	$faker = Faker\Factory::create();
	for ($i=0; $i < $users; $i++) {
 		 $users_array[] = [$faker, Faker\Provider\Image::imageUrl($width = 80, $height = 80)] ;
	}

	
	return View::make('users')->with('users',$users_array)->with('error', $error);
});

Route::post('/user-generator/', function()
{
	$users = $_POST['users'];
	$users_array = [];

	$faker = Faker\Factory::create();
	for ($i=0; $i < $users; $i++) {
 		 $users_array[] = [$faker, Faker\Provider\Image::imageUrl($width = 80, $height = 80)] ;
	}

	return View::make('users')->with('users',$users_array)->with('error', false);
	
});



Route::get('/lorem-ipsum/{paragraphs?}', function($paras=0)
{
	if ($paras > 99)
		$paras = 99;

	if ($paras < 0)
		$paras = 0;		
	$error = false;
	if (!is_numeric($paras))
		$error = "Sorry! But I only understand numbers and you ask me for '$paras' paragraphs! What's that?";
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($paras);

	return View::make('paragraphs')->with('paragraphs', $paragraphs)->with('error', $error);
});

Route::post('/lorem-ipsum/', function()
{
	$paras = $_POST['paras'];

	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($paras);
	
	return View::make('paragraphs')->with('paragraphs', $paragraphs)->with('error', false);
});
