<?php

namespace App\Http\Controllers;

use DB;

class InfoBedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $data = DB::table("kamar")->get();
        return view("index");
    }
}
