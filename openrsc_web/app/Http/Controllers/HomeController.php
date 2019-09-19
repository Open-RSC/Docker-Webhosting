<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
	/**
	 * @function secondsToTime()
	 * @param $inputSeconds
	 * @return int
	 * Used to calculate the total input of seconds into years, days, hours, minutes, and seconds
	 */
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
			'yr' => (int)$years,
			'day' => (int)$days,
			'hr' => (int)$hours,
			'min' => (int)$minutes,
			'sec' => (int)$seconds,
		];
		foreach ($sections as $name => $value) {
			if ($value > 0) {
				$timeParts[] = $value . ' ' . $name . ($value == 1 ? '' : 's');
			}
		}
		return implode(', ', $timeParts);
	}

	/**
	 * @function index()
	 * @return Renderable
	 * Shows the main home page and associated database queries
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
				->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
				->count() ?? '0';

		$logins = DB::connection()
				->table('openrsc_players')
				->whereRaw('login_date >= unix_timestamp(login_date - interval 48 hour)')
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

		$totalTime = HomeController::secondsToTime(round($milliseconds / 1000));

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

	public function rules()
	{
		return view('rules');
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
			->orderBy('B.login_date')
			->get();

		return view(
			'online',
			[
				'players' => $players,
			]
		)->with(compact('online'));
	}

	public function createdtoday()
	{
		$players = DB::connection()
			->table('openrsc_players')
			->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
			->orderBy('login_date', 'desc')
			->orderBy('creation_date', 'desc')
			->get();

		return view(
			'createdtoday',
			[
				'players' => $players,
			]
		)->with(compact('createdtoday'));
	}

	public function logins48()
	{
		$players = DB::connection()
			->table('openrsc_players')
			->whereRaw('login_date >= unix_timestamp(login_date - interval 48 hour)')
			->orderBy('login_date', 'desc')
			->orderBy('creation_date', 'desc')
			->get();

		return view(
			'logins48',
			[
				'players' => $players,
			]
		)->with(compact('logins48'));
	}

	public function stats()
	{
		return view('stats');
	}
}
