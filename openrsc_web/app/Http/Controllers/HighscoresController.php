<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HighscoresController extends Controller
{
	public function totalXP($skills)
	{
		$skill_total = 0;
		foreach ($skills as $key => $value) {
			if (substr($key, 0, 4) == "exp_") {
				$skill_total += $value;
			}
		}
		return $skill_total;
	}

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
			->select('*', DB::raw('
			(SUM(a.exp_attack +
			a.exp_defense + 
			a.exp_strength +
			a.exp_defense +
			a.exp_hits +
			a.exp_ranged) +
			a.exp_prayer +
			a.exp_magic +
			a.exp_cooking +
			a.exp_woodcut +
			a.exp_fletching +
			a.exp_fishing +
			a.exp_firemaking +
			a.exp_crafting +
			a.exp_smithing +
			a.exp_mining +
			a.exp_herblaw +
			a.exp_agility +
			a.exp_thieving
			/4.0)
			as total_xp'))
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '=', '10'],
				['b.highscoreopt', '=', '0'],
			])
			->groupBy('b.username')
			->orderBy('b.skill_total', 'desc')
			->orderBy('total_xp', 'desc')
			->paginate(300);

		// prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		if (Config::get('app.authentic') == true) {
			$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
		} else {
			$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');
		}

		/*if ($subpage == $skill_array[0]) {
			$query = array('openrsc_players.' . $subpage . ', openrsc_experience.*', 'openrsc_players.' . $subpage);
		} else {
			$query = array('openrsc_experience.exp_' . $subpage, 'exp_' . $subpage);
		}
		$args = $query[0];
		$order = $query[1];

		$xp = number_format(($subpage == $skill_array[0]) ? intval(totalXP($highscores) / 4.0) : intval($highscores['exp_' . $skill_array] / 4.0));
		*/

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
