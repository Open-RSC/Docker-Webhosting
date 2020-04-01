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
		$query = request('search_name');

		/**
		 * @return Factory|View
		 * @var $highscores
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		if (Config::get('app.authentic') == true) {
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
					['b.group_id', '>=', '10'],
					['b.iron_man', '=', '0'], // no iron man players are displayed
					['b.highscoreopt', '!=', '1'],
					['b.username', 'LIKE', '%' . $query . '%'],
				])
				->groupBy('b.username')
				->orderBy('b.skill_total', 'desc')
				->orderBy('total_xp', 'desc')
				->paginate(21);
		}

		if (Config::get('app.authentic') == false) {
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
					['b.username', 'LIKE', '%' . $query . '%'],
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

		return view('hiscores', [
			'skill_array' => $skill_array,
		])
			->with(compact('highscores'));
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
		$highscores = DB::connection()
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
			'highscores' => $highscores,
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
		 * @var $highscores
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

		$attack = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_attack
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_attack`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$defense = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_defense
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_defense`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$strength = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_strength
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_strength`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$hits = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_hits
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_hits`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$ranged = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_ranged
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_ranged`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$prayer = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_prayer
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_prayer`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$magic = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_magic
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_magic`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$cooking = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_cooking
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_cooking`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$woodcut = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_woodcut
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_woodcut`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$fletching = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_fletching
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_fletching`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$fishing = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_fishing
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_fishing`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$firemaking = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_firemaking
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_firemaking`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$crafting = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_crafting
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_crafting`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$smithing = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_smithing
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_smithing`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$mining = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_mining
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_mining`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$herblaw = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_herblaw
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_herblaw`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$agility = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_agility
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_agility`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		$thieving = DB::connection()
			->table('openrsc_experience as a')
			->select(DB::raw('X.position AS rank'))
			->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_thieving
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_thieving`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
			->get();

		if (Config::get('app.authentic') == false) {
			$runecraft = DB::connection()
				->table('openrsc_experience as a')
				->select(DB::raw('X.position AS rank'))
				->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_runecraft
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_runecraft`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
				->get();
		}

		if (Config::get('app.authentic') == false) {
			$harvesting = DB::connection()
				->table('openrsc_experience as a')
				->select(DB::raw('X.position AS rank'))
				->from(DB::raw("(
				SELECT
					(@row_number := @row_number +1) AS position,
						B.username,
						A.playerID,
						A.exp_harvesting
					FROM
						`openrsc_experience` AS A
					JOIN(
						SELECT
						@row_number := 0
					) r
				LEFT JOIN openrsc_players AS B
				ON
					A.playerID = B.id
				WHERE
					B.banned = 0 AND B.group_id = 10
				ORDER BY
					A.`exp_harvesting`
				DESC
				) X
			WHERE
				X.username = '" . $subpage . "'
			OR
				X.playerID = '" . $subpage . "'
			LIMIT 1
			"))
				->get();
		}

		/**
		 * @var $skill_array
		 * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
		 */
		$skill_array = Config::get('app.authentic') == true ? array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');

		if (Config::get('app.authentic') == true) {
			return view('hiscores_player', [
				'subpage' => $subpage,
				'players' => $players,
				'skill_array' => $skill_array,
				'totalTime' => $totalTime,
				'player_feed' => $player_feed,
				'npc_kills' => $npc_kills,
				'attack' => $attack,
				'defense' => $defense,
				'strength' => $strength,
				'hits' => $hits,
				'ranged' => $ranged,
				'prayer' => $prayer,
				'magic' => $magic,
				'cooking' => $cooking,
				'woodcut' => $woodcut,
				'fletching' => $fletching,
				'fishing' => $fishing,
				'firemaking' => $firemaking,
				'crafting' => $crafting,
				'smithing' => $smithing,
				'mining' => $mining,
				'herblaw' => $herblaw,
				'agility' => $agility,
				'thieving' => $thieving,
			]);
		} else {
			return view('hiscores_player', [
				'subpage' => $subpage,
				'players' => $players,
				'skill_array' => $skill_array,
				'totalTime' => $totalTime,
				'player_feed' => $player_feed,
				'npc_kills' => $npc_kills,
				'attack' => $attack,
				'defense' => $defense,
				'strength' => $strength,
				'hits' => $hits,
				'ranged' => $ranged,
				'prayer' => $prayer,
				'magic' => $magic,
				'cooking' => $cooking,
				'woodcut' => $woodcut,
				'fletching' => $fletching,
				'fishing' => $fishing,
				'firemaking' => $firemaking,
				'crafting' => $crafting,
				'smithing' => $smithing,
				'mining' => $mining,
				'herblaw' => $herblaw,
				'agility' => $agility,
				'thieving' => $thieving,
				'runecraft' => $runecraft,
				'harvesting' => $harvesting,
			]);
		}
	}
}
