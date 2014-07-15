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

// Home Screen
Route::get('/', function()
{
	return View::make('index');
});


// Get method for the user-generator
Route::get('/user-generator/{users?}', function($users=0)
{
	$users_array = [];

	// Check that the values are correct
	if ($users > 99)
		$users = 99;

	if ($users < 0)
		$users = 0;	

	$error = false;
	// If an error occurred in the value passed, inform it
	if (!is_numeric($users))
		$error = "Sorry! But I only understand numbers and you ask me for '$users' users! What's that?";


	$faker = Faker\Factory::create();
	//Generate the users
	for ($i=0; $i < $users; $i++) {
 		 $users_array[] = [$faker, Faker\Provider\Image::imageUrl($width = 80, $height = 80)] ;
	}

	//Generate the view
	return View::make('users')->with('users',$users_array)->with('error', $error);
});

// Post method for generating the users
Route::post('/user-generator/', function()
{
	//Get the input
	$input =  Input::all();
	$users = $input['users'];
	$users_array = [];

	//Generate the users
	$faker = Faker\Factory::create();
	for ($i=0; $i < $users; $i++) {
 		 $users_array[] = [$faker, Faker\Provider\Image::imageUrl($width = 80, $height = 80)] ;
	}

	//Generate the view
	return View::make('users')->with('users',$users_array)->with('error', false);
	
});


//Get method for creating the paragraphs
Route::get('/lorem-ipsum/{paragraphs?}', function($paras=0)
{	
	//Validate the input
	if ($paras > 99)
		$paras = 99;

	if ($paras < 0)
		$paras = 0;		
	$error = false;
	//Check that the parameter passed is a number
	if (!is_numeric($paras))
		$error = "Sorry! But I only understand numbers and you ask me for '$paras' paragraphs! What's that?";

	//Create the paragraph generator
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($paras);

	//Build the view
	return View::make('paragraphs')->with('paragraphs', $paragraphs)->with('error', $error);
});

//Post method for creating the paragraphs
Route::post('/lorem-ipsum/', function()
{
	//Get the post parameters
	$input =  Input::all();
	$paras = $input['paras'];

	//Generate the paragraphs
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($paras);
	
	//Build the view
	return View::make('paragraphs')->with('paragraphs', $paragraphs)->with('error', false);
});
