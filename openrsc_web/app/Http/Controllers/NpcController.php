<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;

class NpcController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        /**
         * @return Factory|View
         * @var $npcs
         * fetches the table row of the npc in view and paginates the results
         */
        $npcs = DB::connection('openrsc')
            ->table('openrsc_npcdef')
            ->where('id', '<=', '793')
            ->orderBy('id', 'asc')
            ->paginate(50);

        return view('npcs')
            ->with(compact('npcs'));
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
        $npcdef = DB::connection('openrsc')
            ->table('openrsc_npcdef')
            ->find($id);
        if (! $npcdef) {
            abort(404);
        }

        /**
         * @var
         * gathers a list of the npcs and their associated drop tables, then paginates the table
         */
        $npc_drops = DB::connection('openrsc')
            ->table('openrsc_npcdrops AS B')
            ->join('openrsc_npcdef AS A', 'A.id', '=', 'B.npcdef_id')
            ->join('openrsc_itemdef AS C', 'B.id', '=', 'C.id')
            ->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
            ->where('B.npcdef_id', '=', $id)
            ->paginate(50);

        return view('npcdef', [
            'npc_drops' => $npc_drops,
        ])
            ->with(compact('npcdef'));
    }
}
