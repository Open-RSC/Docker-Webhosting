<?php

namespace App\Http\Controllers;

use App\news_post;
use App\news_response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class News_ResponseController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth'); // requires login for all functions
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
		$this->validate($request, [
			'reply' => 'required|min:5|max:500',
			'news_post_id' => 'required|integer'
		]);

		$news_response = new news_response();
		$news_response->reply = $request->reply;
		$news_response->user()->associate(Auth::id()); // gets the currently logged in user id

		$news_post = news_post::findOrFail($request->news_post_id);
		$news_post->news_responses()->save($news_response);

		return redirect()->route('news.show', $news_post->id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return void
	 */
	public function edit($id)
	{
		// prevent unauthorized users from editing other user's comments
		$news_response = News_Response::findOrFail($id);
		if ($news_response->user->id != Auth::id()) {
			return abort(403);
		}
		return view('news_response.edit');
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
		// prevent unauthorized users from editing other user's comments
		$news_response = News_Response::findOrFail($id);
		if ($news_response->user->id != Auth::id()) {
			return abort(403);
		}
		// update the comment
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return void
	 */
	public function destroy($id)
	{
		// prevent unauthorized users from deleting other user's comments
		$news_response = News_Response::findOrFail($id);
		if ($news_response->user->id != Auth::id()) {
			return abort(403);
		}

		// delete the comment
		$news_response->delete();

		return redirect()->route('news.show', $news_response->news_post->id)->with('success', 'Comment deleted.');
	}
}
