<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\View;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return Renderable
	 */
	public function index()
	{
		$GAME_HOSTNAME = config('app.game_hostname');
		$GAME_PORT = config('app.game_port');

		$online = DB::connection()->table('openrsc_players')->where('online', 1)->count();
		$status = @fsockopen($GAME_HOSTNAME, $GAME_PORT, $num, $error, 2);

		if ($status) {
			$status = '<span style="color: lime">Online</span>';
		} else {
			$status = '<span style="red">Offline</span>';
		}

		$registrations = DB::connection()->table('openrsc_players')->where('creation_date', today())->count() ?? '0';
		$logins = DB::connection()->table('openrsc_players')->where('login_date', today())->count();
		$totalPlayers = DB::connection()->table('openrsc_players')->count();
		$uniquePlayers = DB::connection()->table('openrsc_players')->distinct('creation_ip')->count('creation_ip');

		$seconds = DB::connection()->table('openrsc_player_cache')->where('key', 'total_played')->sum('value');
		$days = intval(floor($seconds / (24 * 60 * 60)));
		$hours = intval(floor(($seconds - ($days * 24 * 60 * 60)) / (60 * 60)));
		$totalTime = "{$days}d {$hours}h";

		return view(
			'home',
			[
				'online' => $online,
				'status' => $status,
				'registrations' => $registrations,
				'logins' => $logins,
				'totalPlayers' => $totalPlayers,
				'uniquePlayers' => $uniquePlayers,
				'totalTime' => $totalTime,
				//'activityfeed' => $activityfeed,
			]
		);
	}

	/**
	 * Display the live world map.
	 *
	 * @return Response
	 */
	public function world()
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

	/**
	 * Display the FAQ
	 *
	 * @return \Illuminate\Contracts\View\Factory|View
	 */
	public function faq()
	{
		return view('faq');
	}
}
