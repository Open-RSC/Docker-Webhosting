<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{

	/**
	 * @return Factory|View
	 */
	public function index()
	{
		// query the database and paginate results
		$items = DB::connection('openrsc')->table('openrsc_itemdef')->
		select('id', 'name', 'description', 'requiredLevel', 'basePrice')->
		orderBy('id', 'asc')->
		paginate(15);

		// return the view and pass in the group of records to loop through
		return view('items')->with('items', $items);
	}

	/**
	 * @param $id
	 * @return Factory|View
	 */
	public function show($id)
	{
		$itemdef = DB::connection('openrsc')->table('openrsc_itemdef')->
		select('*')->
		where('id', $id)->
		limit('1290')->first();

		return view('itemdef', compact('itemdef'));
	}
}

/*
 		$collection = itemDef::limit(1290)->paginate(15);
		$collection->each(function($object) {
			$object->id;
			$object->name;
			$object->description;
			$object->requiredLevel;
			$object->basePrice;
		});
 */
