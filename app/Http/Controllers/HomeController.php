<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Match;
use DB;
use Carbon\Carbon as Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countDate =  DB::table('matches')
                        ->whereRaw('date(time_begin) >= ?',[date('Y-m-d')])
                        ->select(DB::raw('DATE(time_begin) as date'), DB::raw('count(*) as views'))
                        ->groupBy('date')
                        ->orderBy('time_begin','ASC')
                        ->get();

        $matches = Match::where('role','public')
                ->whereRaw('date(time_begin) >= ?',[date('Y-m-d')])
                ->orderBy('time_begin', 'ASC')
                ->get();
        //dd($matches);
        return view('home',['matches' => $matches,'countDate' => $countDate]);
    }
}
