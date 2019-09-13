<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HighscoresController extends Controller
{
	/**
	 * @return Factory|View
	 */
	public function index()
	{
		/**
		 * @return Factory|View
		 * @var $highscores
		 * fetches the table row of the npc in view and paginates the results
		 */
		$highscores = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('b.id', 'b.username as username', 'b.group_id', 'b.banned', 'b.highscoreopt', 'b.skill_total', 'b.login_date')
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '=', '10'],
				['b.highscoreopt', '=', '0']
			])
			->orderBy('id', 'desc')
			->paginate(300);

		$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

		function totalXP($skills)
		{
			$skill_total = 0;
			foreach ($skills as $key => $value) {
				if (substr($key, 0, 4) == "exp_") {
					$skill_total += $value;
				}
			}
			return $skill_total;
		}

		return view('highscores', [
			'skill_array' => $skill_array,
		])
			->with(compact('highscores'));
	}

	/**
	 * @param $id
	 * @return Factory|View
	 */
	public function show($id)
	{
		/**
		 * @var
		 * queries the npc and returns a 404 error if not found in database
		 */
		$highscoreskill = DB::connection()
			->table('openrsc_experience')
			->find($id);
		if (!$highscoreskill) {
			abort(404);
		}

		/**
		 * @var
		 * gathers a list of the npcs and their associated drop tables, then paginates the table
		 */
#		$npc_drops = DB::connection()
#			->table('openrsc_npcdrops AS B')
#			->join('openrsc_npcdef AS A', 'A.id', '=', 'B.npcdef_id')
#			->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
#			->where('B.npcdef_id', '=', $id)
#			->paginate(50);

		return view('highscoreskill', [
#			'npc_drops' => $npc_drops,
		])
			->with(compact('highscoreskill'));
	}
}
