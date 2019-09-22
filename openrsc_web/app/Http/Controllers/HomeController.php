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
		$online = DB::table('openrsc_players')
			->where('online', 1)
			->count();
		$status = @fsockopen($game_hostname, $game_port, $num, $error, 2);
		if ($status) {
			$status = '<span style="color: lime">Online</span>';
		} else {
			$status = '<span style="color: red">Offline</span>';
		}

		$registrations = DB::table('openrsc_players')
				->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
				->count() ?? '0';

		$logins = DB::table('openrsc_players')
				->whereRaw('login_date >= unix_timestamp(login_date - interval 48 hour)')
				->count() ?? '0';

		$totalPlayers = DB::table('openrsc_players')
				->count() ?? '0';

		$uniquePlayers = DB::table('openrsc_players')
			->distinct('creation_ip')
			->count('creation_ip');

		$milliseconds = DB::table('openrsc_player_cache')
			->where('key', 'total_played')
			->sum('value');

		$totalTime = HomeController::secondsToTime(round($milliseconds / 1000));

		$activityfeed = DB::table('openrsc_live_feeds as B')
			->join('openrsc_players AS A', 'A.username', '=', 'B.username')
			->where([
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
				['B.time', '>=', 'unix_timestamp(current_date - interval 10 day)'],
			])
			->orderBy('time', 'desc')
			->limit(20)
			->get();

		$sumgoldbank = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->sum('B.amount');

		$sumgoldinvitems = DB::table('openrsc_invitems as B')
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
		$players = DB::table('openrsc_players as B')
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
		$players = DB::table('openrsc_players')
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
		$players = DB::table('openrsc_players')
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
		$online = DB::table('openrsc_players')
			->where('online', '=', '1')
			->count('online');

		$registrations = DB::table('openrsc_players')
				->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
				->count() ?? '0';

		$logins48 = DB::table('openrsc_players')
				->whereRaw('login_date >= unix_timestamp(login_date - interval 48 hour)')
				->count() ?? '0';

		$totalPlayers = DB::table('openrsc_players')
				->count() ?? '0';

		$uniquePlayers = DB::table('openrsc_players')
			->distinct('creation_ip')
			->count('creation_ip');

		$createdToday = DB::table('openrsc_players')
			->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
			->orderBy('login_date', 'desc')
			->orderBy('creation_date', 'desc')
			->count();

		$milliseconds = DB::table('openrsc_player_cache')
			->where('key', 'total_played')
			->sum('value');

		$totalTime = HomeController::secondsToTime(round($milliseconds / 1000));

		$sumgoldBank = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->sum('B.amount');

		$sumgoldInvitems = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->sum('B.amount');

		$sumGold = $sumgoldBank + $sumgoldInvitems;

		$combat30 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '30'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$combat50 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '50'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$combat80 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '50'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$combat90 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '90'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$combat100 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '100'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$combat123 = DB::table('openrsc_players')
			->where([
				['combat', '>=', '123'],
				['group_id', '=', '10'],
				['banned', '=', 0],
			])
			->count();

		$startedQuest = DB::table('openrsc_quests as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['A.group_id', '=', '10'],
				['A.banned', '=', 0],
			])
			->distinct('B.playerID')
			->count();

		$goldBank30 = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '30000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems30 = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '30000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold30 = $goldBank30 + $goldInvitems30;

		$goldBank50 = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '50000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems50 = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '50000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold50 = $goldBank50 + $goldInvitems50;

		$goldBank80 = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '80000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems80 = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '80000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold80 = $goldBank80 + $goldInvitems80;

		$goldBank120 = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1200000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems120 = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1200000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold120 = $goldBank120 + $goldInvitems120;

		$goldBank400 = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '400000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems400 = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '400000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold400 = $goldBank400 + $goldInvitems400;

		$goldBank1m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems1m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold1m = $goldBank1m + $goldInvitems1m;

		$goldBank12m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1200000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems12m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1200000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold12m = $goldBank12m + $goldInvitems12m;

		$goldBank15m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1500000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems15m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '1500000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold15m = $goldBank15m + $goldInvitems15m;

		$goldBank2m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '2000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems2m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '2000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold2m = $goldBank2m + $goldInvitems2m;

		$goldBank4m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '4000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems4m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '4000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$gold4m = $goldBank4m + $goldInvitems4m;

		$goldBank10m = DB::table('openrsc_bank as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '10000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$goldInvitems10m = DB::table('openrsc_invitems as B')
			->join('openrsc_players AS A', 'A.id', '=', 'B.playerID')
			->where([
				['B.id', '=', '10'],
				['B.amount', '>=', '10000000'],
				['A.group_id', '=', '10'],
				['A.banned', '=', '0'],
			])
			->count();

		$stats = DB::table('openrsc_bank as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->join('openrsc_itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, a.amount number, a.slot, c.name'))
			->where(function ($query) {
				$query->where([
						['b.group_id', '=', '10'],
						['b.banned', '=', '0'],
					])
					->where('a.id', '=', '422') // pumpkin
					->orwhere('a.id', '=', '575') // cracker
					->orwhere('a.id', '=', '577') // yellow phat
					->orwhere('a.id', '=', '581') // white phat
					->orwhere('a.id', '=', '580') // purple phat
					->orwhere('a.id', '=', '576') // red phat
					->orwhere('a.id', '=', '578') // blue phat
					->orwhere('a.id', '=', '579') // green phat
					->orwhere('a.id', '=', '677') // easter egg
					->orwhere('a.id', '=', '831') // red mask
					->orwhere('a.id', '=', '832') // blue mask
					->orwhere('a.id', '=', '828') // green mask
					->orwhere('a.id', '=', '971') // santa hat
					->orwhere('a.id', '=', '1156') // bunny ears
					->orwhere('a.id', '=', '1289') // scythe
					->orwhere('a.id', '=', '1278') // dragon square
					->orWhere('a.id', '=', '795') // dragon med
					->orwhere('a.id', '=', '522') // dragon ammy
					->orwhere('a.id', '=', '597') // charged dragon ammy
					->orwhere('a.id', '=', '594') // dragon battle
					->orwhere('a.id', '=', '593') // dragon long
				;
			})
			->orderBy('a.id', 'asc')
			->get();

		if (!$stats) {
			abort(404);
		}

		$gold10m = $goldBank10m + $goldInvitems10m;

		return view(
			'stats',
			[
				'online' => $online,
				'stats' => $stats,
				'registrations' => $registrations,
				'logins48' => $logins48,
				'totalPlayers' => $totalPlayers,
				'uniquePlayers' => $uniquePlayers,
				'totalTime' => $totalTime,
				'createdToday' => $createdToday,
				'combat30' => $combat30,
				'combat50' => $combat50,
				'combat80' => $combat80,
				'combat90' => $combat90,
				'combat100' => $combat100,
				'combat123' => $combat123,
				'startedQuest' => $startedQuest,
				'sumgold' => $sumGold,
				'gold30' => $gold30,
				'gold50' => $gold50,
				'gold80' => $gold80,
				'gold120' => $gold120,
				'gold400' => $gold400,
				'gold1m' => $gold1m,
				'gold12m' => $gold12m,
				'gold15m' => $gold15m,
				'gold2m' => $gold2m,
				'gold4m' => $gold4m,
				'gold10m' => $gold10m,
			]
		)->with(compact('stats'));
	}
}
