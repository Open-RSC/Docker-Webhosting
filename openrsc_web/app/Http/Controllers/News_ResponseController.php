<?php

namespace App\Http\Controllers;

use App\news_post;
use App\news_response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class News_ResponseController extends Controller
{
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
        	'reply' => 'required|min:15|max:500',
			'news_post_id' => 'required|integer'
		]);

        $news_response = new news_response();
		$news_response->reply = $request->reply;

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
