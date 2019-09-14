<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\View;

class HomeController extends Controller
{
	public function secondsToTime($inputSeconds)
	{
		$secondsInAMinute = 60;
		$secondsInAnHour = 60 * $secondsInAMinute;
		$secondsInADay = 24 * $secondsInAnHour;
		$secondsInAYear = 365 * $secondsInADay;

		// Extract years
		$years = floor($inputSeconds / $secondsInAYear);

		// Extract days
		$daySeconds = $inputSeconds % $secondsInAYear;
		$days = floor($daySeconds / $secondsInADay);

		// Extract hours
		$hourSeconds = $inputSeconds % $secondsInADay;
		$hours = floor($hourSeconds / $secondsInAnHour);

		// Extract minutes
		$minuteSeconds = $hourSeconds % $secondsInAnHour;
		$minutes = floor($minuteSeconds / $secondsInAMinute);

		// Extract the remaining seconds
		$remainingSeconds = $minuteSeconds % $secondsInAMinute;
		$seconds = ceil($remainingSeconds);

		// Format and return
		$timeParts = [];
		$sections = [
			'year' => (int)$years,
			'day' => (int)$days,
			'hour' => (int)$hours,
		];
		foreach ($sections as $name => $value) {
			if ($value > 0) {
				$timeParts[] = $value . ' ' . $name . ($value == 1 ? '' : 's');
			}
		}
		return implode(', ', $timeParts);
	}

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
			$status = '<span style="color: red">Offline</span>';
		}

		$registrations = DB::connection()
				->table('openrsc_players')
				->where('creation_date', today())
				->count() ?? '0';

		$logins = DB::connection()
				->table('openrsc_players')
				->where('login_date', today())
				->count() ?? '0';

		$totalPlayers = DB::connection()
				->table('openrsc_players')
				->count() ?? '0';

		$uniquePlayers = DB::connection()
			->table('openrsc_players')
			->distinct('creation_ip')
			->count('creation_ip');

		$milliseconds = DB::connection()
			->table('openrsc_player_cache')
			->where('key', 'total_played')
			->sum('value');

		$totalTime = HomeController::secondsToTime(round($milliseconds/1000));

		$activityfeed = DB::connection()
			->table('openrsc_live_feeds as B')
			->join('openrsc_players AS A', 'A.username', '=', 'B.username')
			->where([
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
				['B.time', '>=', 'unix_timestamp(current_date - interval 10 day)'],
			])
			->orderBy('time', 'desc')
			->limit(20)
			->get();

		$sumgoldbank = DB::connection()
			->table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->sum('B.amount');

		$sumgoldinvitems = DB::connection()
			->table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->sum('B.amount');

		$sumgold = $sumgoldbank + $sumgoldinvitems;

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
				'sumgold' => $sumgold,
			]
		)->with(compact('home'));
	}

	public function world()
	{
		return view('worldmap');
	}

	public function wilderness()
	{
		return view('wilderness');
	}

	public function faq()
	{
		return view('faq');
	}

	public function online()
	{
		$players = DB::connection()
			->table('openrsc_players as B')
			->join('openrsc_player_cache AS A', 'A.playerID', '=', 'B.id')
			->where([
				['B.online', '=', '1'],
				['A.key', '=', 'total_played']
			])
			->get();

		return view(
			'online',
			[
				'players' => $players,
			]
		)->with(compact('online'));
	}

	public function registrationstoday()
	{
		return view('registrationstoday');
	}

	public function logins48()
	{
		return view('logins48');
	}

	public function stats()
	{
		return view('stats');
	}
}
