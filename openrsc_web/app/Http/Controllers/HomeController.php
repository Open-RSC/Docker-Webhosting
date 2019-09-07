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
		$game_hostname = config('app.game_hostname');
		$game_port = config('app.game_port');
		$online = DB::connection()
			->table('openrsc_players')
			->where('online', 1)
			->count();
		$status = @fsockopen($game_hostname, $game_port, $num, $error, 2);
		if ($status) {
			$status = '<span style="color: lime">Online</span>';
		} else {
			$status = '<span style="red">Offline</span>';
		}

		$registrations = DB::connection()
				->table('openrsc_players')
				->where('creation_date', today())
				->count() ?? '0';

		$logins = DB::connection()
			->table('openrsc_players')
			->where('login_date', today())
			->count();

		$totalPlayers = DB::connection()
			->table('openrsc_players')
			->count();

		$uniquePlayers = DB::connection()
			->table('openrsc_players')
			->distinct('creation_ip')
			->count('creation_ip');

		$seconds = DB::connection()
			->table('openrsc_player_cache')
			->where('key', 'total_played')
			->sum('value');
		$days = intval(floor($seconds / (24 * 60 * 60)));
		$hours = intval(floor(($seconds - ($days * 24 * 60 * 60)) / (60 * 60)));
		$totalTime = "{$days}d {$hours}h";

		$activityfeed = DB::connection()
			->table('openrsc_live_feeds as B')
			->join('openrsc_players AS A', 'A.username', '=', 'B.username')
			->where([
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->orderBy('time', 'desc')
			->limit(100)
			->paginate(5);

		//$activityfeed_time = $time->formatLocalized('%Y-%m-%dT%H:%M:%S');
		//SELECT B.id, A.group_id, B.username, B.message, B.time, A.id AS pid, A.username FROM openrsc_live_feeds as B LEFT JOIN openrsc_players as A on B.username = A.username WHERE B.time >= unix_timestamp( current_date - interval 10 day) AND A.banned = '0' AND A.group_id >= '10' ORDER BY B.time DESC LIMIT 100"

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
				'activityfeed' => $activityfeed,
			]
		)->with(compact('home'));
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
