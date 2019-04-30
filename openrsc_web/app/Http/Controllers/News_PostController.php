<?php

namespace App\Http\Controllers;

use App\news_post;
use App\news_response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class News_PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]); // requires login for all functions except these
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return void
	 */
	public function index()
	{
		// go to the model and get a group of records
		$news_posts = News_Post::orderBy('id', 'desc')->paginate(4);

		// return the view and pass in the group of records to loop through
		return view('news.index')->with('news_posts', $news_posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return void
	 * @throws ValidationException
	 */
	public function store(Request $request)
	{
		// validate the form data
		$this->validate($request, [
			'title' => 'required|min:15|max:255',
			'description' => 'required|min:15'
		]);

		// process the data and submit it
		$news_post = new news_post();
		$news_post->title = $request->title;
		$news_post->description = $request->description;
		$news_post->user()->associate(Auth::id()); // gets the currently logged in user id

		// if successful we want to redirect
		if ($news_post->save()) {
			return redirect()->route('news.show', $news_post->id);
		} else {
			return redirect()->route('news.create');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id)
	{
		// use the model to get one record from the database
		$news_post = News_Post::findOrFail($id);

		// show the view and pass the record to the view
		return view('news.show')->with('news_post', $news_post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return void
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return void
	 */
	public function destroy($id)
	{
		//
	}
}
