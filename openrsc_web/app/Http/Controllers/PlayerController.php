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
				['b.banned', '=', '0'],
				['a.id', '=', $subpage],
			])
			->orWhere([
				['b.banned', '=', '0'],
				['b.username', '=', $subpage],
			])
			->get();
		if (!$players) {
			abort(404);
		}

		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

		return view('player', [
			'subpage' => $subpage,
			'players' => $players,
			'skill_array' => $skill_array,
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
				['b.banned', '=', '0'],
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
				['b.banned', '=', '0'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.banned', '=', '0'],
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
				['b.banned', '=', '0'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.banned', '=', '0'],
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
