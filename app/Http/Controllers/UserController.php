<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;

use Auth;

class UserController extends Controller
{
    public function getHistory(){
    	
    	$recordBet = DB::table('bets')
    				->where('user_id', Auth::id())
    				->join('matches', 'bets.match_id', '=', 'matches.id')
    				->select('bets.choose_win','bets.coins_bet','bets.created_at','matches.home_team','matches.visitor_team','matches.home_win','matches.visitor_win','matches.zero_zero','matches.time_begin','matches.time_end','matches.home_score','matches.visitor_score','matches.process')
    				->get();
    	//dd($recordBet);
    	$account = User::find(Auth::id());
    	//dd($account);

    	return view('history',['account' => $account, 'recordBet' => $recordBet]);
    }
}
