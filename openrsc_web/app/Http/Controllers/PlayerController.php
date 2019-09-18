<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

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

	public function bank($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $subpage
		 * queries the npc and returns a 404 error if not found in database
		 */
		/*if (!in_array($subpage, $skill_array)) {
			abort(404);
		}*/

		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$banks = DB::connection()
			->table('openrsc_bank as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot'))
			->where([
				['b.banned', '=', '0'],
				['b.username', '=', $subpage]
			])
			->orderBy('a.slot', 'asc')
			->get();

		$count_inv = $banks->count();

		return view('bank', [
			'subpage' => $subpage,
			'banks' => $banks,
			'count_inv' => $count_inv,
		])
			->with(compact('$banks'));
	}
}
