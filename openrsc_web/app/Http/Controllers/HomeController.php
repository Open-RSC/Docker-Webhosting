<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return Renderable
	 */
	public function index()
	{
		$openrsc_online = DB::connection('openrsc')->table('openrsc_players')->where('online', 1)->count();
		$openrsc_status = @fsockopen("game.openrsc.com", "43594", $num, $error, 5);

		if ($openrsc_status) {
			$openrsc_status = "<span style=\"color: lime\">Online</span>";
		} else {
			$openrsc_status = "<span style=\"red\">Offline</span>";
		}

		$openrsc_registrations = DB::connection('openrsc')->table('openrsc_players')->where('creation_date', today())->count() ?? '0';
		$openrsc_logins = DB::connection('openrsc')->table('openrsc_players')->where('login_date', today())->count();
		$openrsc_totalPlayers = DB::connection('openrsc')->table('openrsc_players')->count();
		$openrsc_uniquePlayers = DB::connection('openrsc')->table('openrsc_players')->distinct('creation_ip')->count('creation_ip');

		$seconds = DB::connection('openrsc')->table('openrsc_player_cache')->where('key', 'total_played')->sum('value');
		$days = intval(floor($seconds / (24 * 60 * 60)));
		$hours = intval(floor(($seconds - ($days * 24 * 60 * 60)) / (60 * 60)));
		$openrsc_totalTime = "{$days}d {$hours}h";

		return view(
			'home',
			[
				'openrsc_online' => $openrsc_online,
				'openrsc_status' => $openrsc_status,
				'openrsc_registrations' => $openrsc_registrations,
				'openrsc_logins' => $openrsc_logins,
				'openrsc_totalPlayers' => $openrsc_totalPlayers,
				'openrsc_uniquePlayers' => $openrsc_uniquePlayers,
				'openrsc_totalTime' => $openrsc_totalTime
			]
		);
	}
}
