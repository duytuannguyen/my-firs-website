<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BetFormRequest;
use App\User;
use App\Bet;
use Auth;
use App\Match;


class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BetFormRequest $request)
    {
        //dd($request->all());
        $user_coin = User::find(Auth::id())->coin;
        //dd( Match::find($request->match_id)->home_win);
        $routeMatch = 'match/' . $request->match_id;
        if($user_coin < $request->coins_bet){
            return redirect($routeMatch)->with('error', 'Số tiền của bạn còn lại quá ít');
        }

        $user_bet = [   'user_id' => Auth::id(),
                        'match_id' => $request->match_id,
                        'choose_win' => $request->choose_win,
                        'coins_bet' => $request->coins_bet,
                    ];
        //dd( Match::find($request->match_id)->home_win);
        Bet::create($user_bet);
        //$rate = Match::find($request->match_id)->home_win;
        //$total = $request->coins_bet * $rate;
        $user_coin = $user_coin - $request->coins_bet;
        User::where('id',Auth::id())->update(['coin' => $user_coin]);
        return redirect($routeMatch)->with('message', 'Bạn đã thao tác thành công. Cám ơn bạn! Chúc bạn may mắn!');

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
