<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HighscoresController extends Controller
{
	/**
	 * @function totalXP()
	 * @param $skills
	 * @return int
	 * Used to retrieve each skill's experience table
	 */
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
	 * @function experienceToLevel()
	 * @param $exp
	 * @return int
	 * Used to calculate skill levels based on $experienceArray
	 */
	public function experienceToLevel($exp)
	{
		$experienceArray = array(0, 83, 174, 276, 388, 512, 650, 801, 969, 1154, 1358, 1584, 1833, 2107, 2411, 2746, 3115, 3523, 3973, 4470, 5018, 5624, 6291, 7028, 7842, 8740, 9730, 10824, 12031, 13363, 14833, 16456, 18247, 20224, 22406, 24815, 27473, 30408, 33648, 37224, 41171, 45529, 50339, 55649, 61512, 67983, 75127, 83014, 91721, 101333, 111945, 123660, 136594, 150872, 166636, 184040, 203254, 224466, 247886, 273742, 302288, 333804, 368599, 407015, 449428, 496254, 547953, 605032, 668051, 737627, 814445, 899257, 992895, 1096278, 1210421, 1336443, 1475581, 1629200, 1798808, 1986068, 2192818, 2421087, 2673114, 2951373, 3258594, 3597792, 3972294, 4385776, 4842295, 5346332, 5902831, 6517253, 7195629, 7944614, 8771558, 9684577, 10692629, 11805606, 13034431, 14391160, 15889109, 17542976, 19368992, 21385073, 23611006, 26068632, 28782069, 31777943, 35085654, 38737661, 42769801, 47221641, 52136869, 57563718, 63555443, 70170840, 77474828, 85539082, 94442737, 104273167);
		for ($level = 0; $level < 98; $level++) {
			if ($exp / 4 >= $experienceArray[$level + 1]) {
				continue;
			}
			return ($level + 1);
		}
		return 99;
	}

	/**
	 * @function index()
	 * @return Factory|View
	 * Used to show the main highscores page
	 */
	public function index()
	{
		/**
		 * @return Factory|View
		 * @var $highscores_authentic
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		if (Config::get('app.authentic') == true) {
			$highscores_authentic = DB::connection()
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
					['b.group_id', '>=', '10'],
					['b.iron_man', '=', '0'], // no iron man players are displayed
					['b.highscoreopt', '!=', '1'],
				])
				->groupBy('b.username')
				->orderBy('b.skill_total', 'desc')
				->orderBy('total_xp', 'desc')
				->paginate(21);
		}

		/**
		 * @return Factory|View
		 * @var $highscores_custom
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		if (Config::get('app.authentic') == false) {
			$highscores_custom = DB::connection()
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
			a.exp_thieving +
			a.exp_runecraft +
			a.exp_harvesting
			/4.0)
			as total_xp'))
				->where([
					['b.banned', '=', '0'],
					['b.group_id', '>=', '10'],
					['b.iron_man', '=', '0'], // no iron man players are displayed
					['b.highscoreopt', '!=', '1'],
				])
				->groupBy('b.username')
				->orderBy('b.skill_total', 'desc')
				->orderBy('total_xp', 'desc')
				->paginate(21);
		}

		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('overall', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('overall', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');

		if (Config::get('app.authentic') == true) {
			return view('hiscores', [
				'skill_array' => $skill_array,
			])
				->with(compact('highscores_authentic'));
		} else {
			return view('hiscores', [
				'skill_array' => $skill_array,
			])
				->with(compact('highscores_custom'));
		}
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
		$skill_array = Config::get('app.authentic') == true ? array('overall', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('overall', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');

		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $subpage
		 * queries the npc and returns a 404 error if not found in database
		 */
		if (!in_array($subpage, $skill_array)) {
			abort(404);
		}

		/**
		 * @var $highscores
		 * Fetches the table row of the player experience in view and paginates the results
		 * Two instances of this query exist so that the site can support a single template with custom or authentic skills
		 */
		$highscores_authentic = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('*', DB::raw('a.exp_' . $subpage))
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '>=', '10'],
				['b.iron_man', '=', '0'], // no iron man players are displayed
				['b.highscoreopt', '!=', '1'],
			])
			->groupBy('b.username')
			->orderBy('a.exp_' . $subpage, 'desc')
			->paginate(21);

		$highscores_custom = DB::connection()
			->table('openrsc_experience as a')
			->join('openrsc_players as b', 'a.playerID', '=', 'b.id')
			->select('*', DB::raw('a.exp_' . $subpage))
			->where([
				['b.banned', '=', '0'],
				['b.group_id', '>=', '10'],
				['b.iron_man', '=', '0'], // no iron man players are displayed
				['b.highscoreopt', '!=', '1'],
			])
			->groupBy('b.username')
			->orderBy('a.exp_' . $subpage, 'desc')
			->paginate(21);

		$skill = 'exp_' . $subpage;

		return view('hiscores', [
			'skill_array' => $skill_array,
			'subpage' => $subpage,
			'exp_' . $subpage => $skill,
			'highscores_authentic' => $highscores_authentic,
			'highscores_custom' => $highscores_custom,
		])
			->with('hiscores');
	}

	public function player($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 * Two instances of this query exist so that the site can support a single template with custom or authentic skills
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $highscores_authentic
		 * Fetches the table row of the player experience in view and paginates the results
		 */
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

		$npc_kills = DB::connection()
			->table('openrsc_npckills as a')
			->join('openrsc_players AS b', 'a.playerID', '=', 'b.id')
			->join('openrsc_npcdef as c', 'a.npcID', '=', 'c.id')
			->where([
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.username', '=', $subpage],
			])
			->orderBy('a.killCount', 'desc')
			->limit(30)
			->get();

		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');

		return view('hiscores_player', [
			'subpage' => $subpage,
			'players' => $players,
			'skill_array' => $skill_array,
			'player_gang' => $player_gang,
			'totalTime' => $totalTime,
			'player_feed' => $player_feed,
			'npc_kills' => $npc_kills,
		]);
	}
}
