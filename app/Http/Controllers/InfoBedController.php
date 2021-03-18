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
        $classColorRowTable = [ "table-primary", "table-success", "table-danger", "table-warning", "tabel-info"];
        $data = DB::table("kamar")
                ->select(
                    "kelas",
                    DB::raw(" SUM(jumlah_bed) AS kapasitas"),
                    DB::raw("(SELECT COUNT(1) FROM kamarpakai WHERE `kamarpakai`.`kelas` = kamar.`kelas` AND kamarpakai.status_kamar = 'MASUK') AS 'terisi'")
                )
                ->where("kategori","=", "Neonatus")
                ->where("kelas", "!=", "NICU")
                ->groupBy("kelas")
                ->get();
        return view("index", compact('data', 'classColorRowTable'));
    }
}
