<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ItemController extends Controller
{

	public function index()
	{
		// query the database and paginate results
		$items = DB::table('openrsc_itemdef')->
		select('id', 'name', 'description', 'requiredLevel', 'basePrice')->
		orderBy('id', 'asc')->
		paginate(15);

		// return the view and pass in the group of records to loop through
		return view('items')->with('items', $items);
	}

	public function show(Request $request, $id)
	{
		$itemdef = DB::table('openrsc_itemdef')->
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
