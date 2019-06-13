<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
	/**
	 * Display the live world map.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('worldmap')
			->with(compact('worldmap'));
	}

	/**
	 * Display the wilderness map.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function wilderness()
	{
		return view('wilderness');
	}
}
