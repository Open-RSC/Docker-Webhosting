<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    /**
     * Display the live world map.
     *
     * @return Response
     */
    public function index()
    {
        $playerPositions = DB::connection('openrsc')->table('openrsc_players')->where('online', 0)->get();

        return view('worldmap', [
            'coords' => $playerPositions,
        ])
            ->with(compact('coords'));
    }

    /**
     * Display the wilderness map.
     *
     * @return Response
     */
    public function wilderness()
    {
        return view('wilderness');
    }
}
