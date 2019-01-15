<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index() {
        $online = DB::table('openrsc_players')->where('online', 1)->count();

        $status = @fsockopen("game.openrsc.com", "43594", $num, $error, 5);

        if ($status) {
            $status = "<span style=\"color: lime\">Online</span>";
        } else {
            $status = "<span style=\"red\">Offline</span>";
        }

        $registrations = DB::table('openrsc_players')->where('creation_date', today())->count() ?? '0';
        $logins = DB::table('openrsc_players')->where('login_date', today())->count();
        $totalPlayers = DB::table('openrsc_players')->count();
        $uniquePlayers = DB::table('openrsc_players')->distinct('creation_ip')->count('creation_ip');

        //This should almost definitely be re-written...
        $time = DB::select("SELECT SUM(`value`) FROM `openrsc_player_cache` WHERE `openrsc_player_cache`.`key` = 'total_played'");
        $time = collect($time)->map(function($x){ return (array) $x; })->toArray();
        $time = $time[0]['SUM(`value`)'];
        $days = floor($time / (24 * 60 * 60));
        $hours = floor(($time - ($days * 24 * 60 * 60)) / (60 * 60));
        $totalTime = $days . 'd ' . $hours . 'h ';

        return view('home',
        [
            'online' => $online,
            'status' => $status,
            'registrations' => $registrations,
            'logins' => $logins,
            'totalPlayers' => $totalPlayers,
            'uniquePlayers' => $uniquePlayers,
            'time' => $totalTime

        ]);
    }
}
