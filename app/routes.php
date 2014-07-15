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


// Post method for generating the users
Route::get('/password/', function()
{
	return View::make('password')->with('password', "")->with('customization',[]);
});

Route::post('password', function(){
	//Get the input
	$input =  Input::all();

	/* Read the dictionary. If the source of words change, as for example scraped from the web, 
	 * hardcoded, or from another file, the rest of the program remains unchanged.
	 * In this case, reading from a file that contains the dictionary of words.
	 */
	$words =  file ( URL::asset('/files/wordlist.txt') );	


	/* Variable initialization */
	$customization['words'] = 3; /* by default use 3 words in the password generated */
	$customization['symbol'] = false; /* if the password has symbols */
	$customization['number'] = false; /* if the password has numbers */
	$customization['capital'] = false; /* if all the letters should be capitalized. */
	$customization['camel_case'] = false; /* if the first letter of each word should be capitalized */
	$customization['first_capital'] = false; /* if the first letter of the password should be capitalized */


	/* Read the variables posted if any, if not use defaults */
	foreach ($input as $key => $value){
		/* check if variable has a value, if it does, record the value*/
		if ($value){
			$customization[$key]= $value;
		}
	}

	$password = "";	/* for storing the generated password. */


	/*Generate the password!*/
	for ($i = 1; $i <= intval($customization['words']); $i++) {
		$wordIndex = rand(0, count($words));   		/*generate a random number*/
		$word = $words[$wordIndex];
		/*Capitalize first letter if applies*/
		if ($customization['camel_case']){
			$word = ucfirst($word);
		}	

		$password .= "-".trim($word);   /*concatenate it from the dictionay*/
	}

	/*Define the default symbol. This can be read from an input as well!*/
	$symbol = "@";
	/*Add symbol if applies*/
	if ($customization['symbol']){
		$password .= $symbol;
	}

	/*Add number if applies*/
	if ($customization['number']){
		$number = rand(0, 9);   		/*generate a random number*/
		$password .= $number;
	}

	/*Capitalize if applies*/
	if ($customization['capital']){
		$password = strtoupper($password);
	}

	/*Clean the first symbol*/
	$password = substr($password, 1);


	/*Capitalize first letter if applies*/
	if ($customization['first_capital']){
		$password = ucfirst($password);
	}

	//Generate the view
	return View::make('password')->with('password',$password)->with('customization',$customization);
	
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
