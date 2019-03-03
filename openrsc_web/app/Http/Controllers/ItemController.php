<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index()
    {
        $items = DB::table('openrsc_itemdef')->select('id', 'name', 'description', 'requiredLevel', 'basePrice')->orderBy('id', 'asc')->get();
        return view('items', compact('items'));
    }

    public function show()
    {
        //TODO Implement DB code here then pass any required variables to the blade template itemdef.blade.php here.
        return view('itemdef');
    }
}
