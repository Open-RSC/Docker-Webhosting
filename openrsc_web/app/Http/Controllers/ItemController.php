<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ItemController extends Controller
{

	public function index()
	{
		$items = DB::table('openrsc_itemdef')->select('id', 'name', 'description', 'requiredLevel', 'basePrice')->limit('1290')->orderBy('id', 'asc')->get();
		return view('items', compact('items'));
	}

	public function show(Request $request, $id)
	{
		$itemdef = DB::table('openrsc_itemdef')->select('*')->where('id', $id)->get();
		return view('itemdef', compact('id'));
	}
}
