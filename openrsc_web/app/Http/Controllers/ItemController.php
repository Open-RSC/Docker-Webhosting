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
		$itemdef = DB::table('openrsc_itemdef')->select('*')->where('id', $id)->limit('1290')->first();
		return view('itemdef', compact('itemdef'));
	}
}

/*$someVariable = Input::get("some_variable");
$results = DB::select(DB::raw("SELECT
SUM(amt) AS amt
FROM
(
SELECT
SUM(B.amount) amt
FROM
openrsc_bank AS B
LEFT JOIN openrsc_players AS A
ON
B.playerID = A.id
WHERE
B.id = :subpage
AND A.group_id > '1' AND A.banned = '0'
UNION ALL
SELECT
SUM(B.amount) amt
FROM
openrsc_invitems AS B
LEFT JOIN openrsc_players AS A
ON
B.playerID = A.id
WHERE
B.id = :subpage
AND A.group_id > '1' AND A.banned = '0'
) a"), array(
    'somevariable' => $someVariable,
));
}*/
