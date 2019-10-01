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

		return view('quest_list');
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 * Used to show all skill-specific sub pages
	 */
	public function show($subpage)
	{
		/**
		 * @var $quest_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$quest_array = Config::get('app.authentic') == true ? array('black_knights_fortress', 'cooks_assistant', 'demon_slayer', 'dorics_quest',
			'the_restless_ghost', 'goblin_diplomacy', 'earnest_the_chicken', 'imp_catcher', 'pirates_treasure', 'price_ali_rescue', 'romeo_and_juliet',
			'sheep_sheerer', 'shield_of_arrav', 'the_knights_sword', 'vampire_slayer', 'witchs_potion', 'dragon_slayer', 'witchs_house', 'lost_city',
			'druidic_ritual', 'heros_quest', 'merlins_crystal', 'scorpion_catcher') : array('black_knights_fortress', 'cooks_assistant', 'demon_slayer',
			'dorics_quest', 'the_restless_ghost', 'goblin_diplomacy', 'earnest_the_chicken', 'imp_catcher', 'pirates_treasure', 'price_ali_rescue',
			'romeo_and_juliet', 'sheep_sheerer', 'shield_of_arrav', 'the_knights_sword', 'vampire_slayer', 'witchs_potion', 'dragon_slayer',
			'witchs_house', 'lost_city', 'druidic_ritual', 'heros_quest', 'merlins_crystal', 'scorpion_catcher');

		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $highscores
		 */
		$highscores = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('*', DB::raw($subpage))
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '=', '10'],
				['b.highscoreopt', '=', '0'],
			])
			->groupBy('b.username')
			->orderBy($subpage, 'desc')
			->paginate(300);

		return view('quest', [
			'quest_array' => $quest_array,
			'subpage' => $subpage,
		])
			->with(compact('quest'));
	}
}
