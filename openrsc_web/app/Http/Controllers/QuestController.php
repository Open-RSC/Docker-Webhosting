<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class QuestController extends Controller
{
	/**
	 * @function index()
	 * @return Factory|View
	 * Used to show the main quests page
	 */
	public function index()
	{
		/**
		 * @return Factory|View
		 * @var $highscores
		 * Fetches the table row of the player experience in view and paginates the results
		 */

		return view('quest');
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 * Used to show all skill-specific sub pages
	 */
	public function show($subpage)
	{
		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $highscores
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$highscores = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('*', DB::raw('a.exp_'.$subpage))
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '=', '10'],
				['b.highscoreopt', '=', '0'],
			])
			->groupBy('b.username')
			->orderBy('a.exp_'.$subpage, 'desc')
			->paginate(300);

		$skill = 'exp_'.$subpage;

		return view('highscoreskill', [
			'skill_array' => $skill_array,
			'subpage' => $subpage,
			'exp_'.$subpage => $skill,
		])
			->with(compact('highscores'));
	}
}
