<?php

namespace App\Http\Controllers;

use App\User;

class PageController extends Controller
{
	public function index()
	{
		$questions = [
			'Why is laravel so awesome?',
			'why do we need routes?',
			'how do i make a model talk to our database?',
			'do you like to use bootstrap with laravel?'
		];
		return view('welcome')->with('questions', $questions);
	}

	public function about()
	{
		return "ABOUT US PAGE";
	}

	public function profile($id)
	{
		$user = User::with(['news_posts', 'news_responses', 'news_responses.news_post'])->find($id); // eager loading with 3 queries instead of n+1 lazy loading
		return view('profile')->with('user', $user);
	}
}
