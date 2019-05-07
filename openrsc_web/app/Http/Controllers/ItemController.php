<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

class ItemController extends Controller
{

	/**
	 * @return Factory|View
	 */
	public function index()
	{
		$items = DB::connection('openrsc')->table('openrsc_itemdef')->
		orderBy('id', 'asc')->
		paginate(15);

		/*$items->each(function($object) {
			$object->id;
			$object->name;
			$object->description;
			$object->requiredLevel;
			$object->requiredSkillID;
			$object->basePrice;
		});*/

		return view('items')->with(compact('items'));
	}

	/**
	 * @param $id
	 * @return Factory|View
	 */
	public function show($id)
	{
		// queries the item and returns a 404 error if not found in database
		$itemdef = DB::connection('openrsc')->table('openrsc_itemdef')->find($id);
		if (!$itemdef) abort(404);


		/**
		 * @var $totalPlayerHeld
		 * determines a count for how many of the item the player base has total
		 */
		$totalPlayerHeld_bank = DB::connection('openrsc')->
		table('openrsc_bank')->
		select('openrsc_bank.id', 'openrsc_bank.playerID', 'openrsc_bank.amount', 'openrsc_players.id', 'openrsc_players.group_id', 'openrsc_players.banned')->
		join('openrsc_players', function ($join) use ($id) {
			$join->on('openrsc_bank.playerID', '=', 'openrsc_players.id')->
			where([
				['openrsc_bank.id', '=', $id],
				['openrsc_players.id', '>=', '10'],
				['openrsc_players.banned', '=', '0']
			]);
		})->
		sum('amount');

		$totalPlayerHeld_invitems = DB::connection('openrsc')->
		table('openrsc_invitems')->
		select('openrsc_invitems.id', 'openrsc_invitems.playerID', 'openrsc_invitems.amount', 'openrsc_players.id', 'openrsc_players.group_id', 'openrsc_players.banned')->
		join('openrsc_players', function ($join) use ($id) {
			$join->on('openrsc_invitems.playerID', '=', 'openrsc_players.id')->
			where([
				['openrsc_invitems.id', '=', $id],
				['openrsc_players.id', '>=', '10'],
				['openrsc_players.banned', '=', '0']
			]);
		})->
		sum('amount');

		$totalPlayerHeld = $totalPlayerHeld_invitems + $totalPlayerHeld_bank;


		/**
		 * @var $last3moPlayerHeld
		 * determines a count for how many of the item the player base has for those active within the last 3 months
		 */

		$last3moPlayerHeld_bank = DB::connection('openrsc')
			->table('openrsc_bank')
			->select('openrsc_bank.id', 'openrsc_bank.playerID', 'openrsc_bank.amount', 'openrsc_players.id', 'openrsc_players.group_id', 'openrsc_players.banned', 'openrsc_players.login_date')
			->join('openrsc_players', function ($join) use ($id) {
				$join->on('openrsc_bank.playerID', '=', 'openrsc_players.id')
					->where([
						['openrsc_bank.id', '=', $id],
						['openrsc_players.id', '>=', '10'],
						['openrsc_players.banned', '=', '0'],
						['openrsc_players.login_date', '>=', Carbon::now()->subMonth(3)->timestamp]
					]);
			})
			->sum('amount');

		$last3moPlayerHeld_invitems = DB::connection('openrsc')
			->table('openrsc_invitems')
			->select('openrsc_invitems.id', 'openrsc_invitems.playerID', 'openrsc_invitems.amount', 'openrsc_players.id', 'openrsc_players.group_id', 'openrsc_players.banned', 'openrsc_players.login_date')
			->join('openrsc_players', function ($join) use ($id) {
				$join->on('openrsc_invitems.playerID', '=', 'openrsc_players.id')
					->where([
						['openrsc_invitems.id', '=', $id],
						['openrsc_players.id', '>=', '10'],
						['openrsc_players.banned', '=', '0'],
						['openrsc_players.login_date', '>=', Carbon::now()->subMonth(3)->timestamp]
					]);
			})
			->sum('amount');

		$last3moPlayerHeld = $last3moPlayerHeld_invitems + $last3moPlayerHeld_bank;


		/**
		 * @var $item_drops
		 * gathers a list of the npcs and their associated drop tables
		 */
		$item_drops = DB::connection('openrsc')
			->table('openrsc_npcdrops AS B')
			->join('openrsc_npcdef AS A', 'A.id', '=', 'B.npcdef_id')
			->join('openrsc_itemdef AS C', 'B.id', '=', 'C.id')
			->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
			->where('B.id', '=', $id)
			->limit('793')
			->paginate(6);


		return view('itemdef', [
			'totalPlayerHeld' => $totalPlayerHeld,
			'last3moPlayerHeld' => $last3moPlayerHeld,
			'item_drops' => $item_drops
		])->with(compact('itemdef'));
	}
}
