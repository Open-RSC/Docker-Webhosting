<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PlayerController extends Controller
{
	/**
	 * @param $n
	 * @return string
	 */
	public function bd_nice_number($n)
	{
		if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
		else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
		else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
		else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';
		return number_format($n);
	}

	public function index($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $players
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$players = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->where([
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.username', '=', $subpage],
			])
			->limit(1)
			->get();
		if (!$players) {
			abort(404);
		}

		$player_gang = DB::connection()
			->table('openrsc_player_cache as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('value')
			->where([
				['a.key', '=', 'arrav_gang'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['a.key', '=', 'arrav_gang'],
				['b.username', '=', $subpage],
			])
			->limit(1)
			->get();

		$milliseconds = DB::connection()
			->table('openrsc_player_cache as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->where([
				['a.key', '=', 'total_played'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['a.key', '=', 'total_played'],
				['b.username', '=', $subpage],
			])
			->sum('value');

		$totalTime = (new HomeController)->secondsToTime(round($milliseconds / 1000));

		$player_feed = DB::connection()
			->table('openrsc_live_feeds as a')
			->join('openrsc_players AS b', 'a.username', '=', 'b.username')
			->where([
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.username', '=', $subpage],
			])
			->orderBy('a.time', 'desc')
			->limit(30)
			->get();

		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');

		return view('player', [
			'subpage' => $subpage,
			'players' => $players,
			'skill_array' => $skill_array,
			'player_gang' => $player_gang,
			'totalTime' => $totalTime,
			'player_feed' => $player_feed,
		])
			->with(compact('$banks'));
	}

	/**
	 * @return Factory|View
	 */
	public function shar()
	{
		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$banks = DB::connection()
			->table('openrsc_bank as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->join('openrsc_itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->Where([
				['b.username', '=', 'shar'],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$banks) {
			abort(404);
		}

		return view('bank', [
			'banks' => $banks,
		])
			->with(compact('$banks'));
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 */
	public function bank($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$banks = DB::connection()
			->table('openrsc_bank as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->join('openrsc_itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->where([
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.username', '=', $subpage],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$banks) {
			abort(404);
		}

		if (!Auth::check()) {
			return redirect('home');
		}

		return view('bank', [
			'subpage' => $subpage,
			'banks' => $banks,
		])
			->with(compact('$banks'));
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 */
	public function invitem($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$invitems = DB::connection()
			->table('openrsc_invitems as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->join('openrsc_itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->where([
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.username', '=', $subpage],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$invitems) {
			abort(404);
		}

		if (!Auth::check()) {
			return redirect('home');
		}

		return view('invitem', [
			'subpage' => $subpage,
			'invitems' => $invitems,
		])
			->with(compact('$invitems'));
	}
}
