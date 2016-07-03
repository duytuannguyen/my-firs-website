<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $listAccount = User::all();
        return view('admin.users',['listAccount' => $listAccount]);
    }


    public function getAccount($id)
    {
        $account = User::find($id);
        //dd($account);
        
        $recordBet = DB::table('bets')
                    ->where('user_id', $account->id)
                    ->join('matches', 'bets.match_id', '=', 'matches.id')
                    ->select('bets.choose_win','bets.coins_bet','bets.created_at','matches.home_team','matches.visitor_team','matches.home_win','matches.visitor_win','matches.zero_zero','matches.time_begin','matches.time_end','matches.home_score','matches.visitor_score','matches.process')
                    ->get();
        //dd($recordBet);
       // $account = User::find(Auth::id());
        //dd($account);

        return view('history',['account' => $account, 'recordBet' => $recordBet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
