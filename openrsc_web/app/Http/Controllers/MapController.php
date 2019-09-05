<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
	/**
	 * Display the live world map.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('worldmap');
	}

	/**
	 * Display the wilderness map.
	 *
	 * @return Response
	 */
	public function wilderness()
	{
		return view('wilderness');
	}
}
