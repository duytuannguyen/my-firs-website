<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateScoreFormRequest;
use App\Http\Requests\CreateMatchFormRequest;
use App\Http\Controllers\Controller;
use App\Match;
use App\Bet;
use App\User;
use DB;
class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = DB::select('SELECT matches.*, (SELECT count(id) FROM bets WHERE matches.id = bets.match_id) as sl FROM matches ORDER BY time_begin');
        //dd($matches);

        /*$matches = Match::groupBy('time_begin')
                        ->orderBy('time_begin', 'ASC')
                        ->get();
        dd($matches);*/
        return view('admin.matches.matches',["matches" => $matches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMatchFormRequest $request)
    {
       //dd();
        $createArray = $request->all();
        $deleteElement = array_shift($createArray);
        //dd($createArray);
        Match::create($createArray);
       return redirect('admin/matches/create')->with('message', 'Tạo trận thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::find($id);
        //dd($match);
        if(!$match){
            return redirect('home');
        }
        if($match->role == 'private'){
            return redirect('home');
        }
         $betHome= Bet::where('match_id',$id)->where('choose_win','home_win')->count();
         $betVisitor= Bet::where('match_id',$id)->where('choose_win','visitor_win')->count();
         $betZero_Zero= Bet::where('match_id',$id)->where('choose_win','zero_zero')->count();
        
        return view('match',['match' => $match,'countBet' =>array(
                                'betHome' => $betHome,
                                'betVisitor' => $betVisitor,
                                'betZero_Zero' => $betZero_Zero
                            )]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUpdateScore($id)
    {
        $match = Match::find($id);
        if(!$match)
            return "Trận đấu không tồn tại";
        if($match->process == "checked")
            return redirect()->route('match.index');

        if(strtotime($match->time_end) < time())
            return view('admin.matches.updatescore',['match' => $match]);
         return redirect()->route('match.index')->with('errors','Trận đấu chưa kết thúc');
    }
    

    public function updateScore(UpdateScoreFormRequest $request,$id)
    {
       //dd($request->all());

        $match = Match::find($id);

        if(!$match)
            return "Trận đấu không tồn tại";
        if($match->process == "checked")
            return redirect()->route('match.index');
        else{
                Match::where('id', $id)->update(['home_score' => $request->home_score,
                                                'visitor_score' => $request->visitor_score,
                                                'process' => 'checked'
                                                ]);
                //XU LY gui tien ve user
                $betWin = $this->isWin($request->home_score,$request->visitor_score);
               

                $bets= Bet::where('match_id',$id)->get();

                foreach ($bets as $bet) {
                    if(!strcmp($bet->choose_win,'home_win'))
                        $rate = $match->home_win;
                    if(!strcmp($bet->choose_win,'visitor_win'))
                        $rate = $match->visitor_win;
                    if(!strcmp($bet->choose_win,'zero_zero'))
                        $rate = $match->zero_zero;

                    if($bet->choose_win == $betWin){
                        $getMoney = $bet->coins_bet * (1 + $rate);
                    }else{
                        $getMoney = 0;
                    }

                    $user_coin = User::find($bet->user_id)->coin;
                    $user_coin = $user_coin + $getMoney;
                    User::where('id',$bet->user_id)->update(['coin' => $user_coin]);

                }



                    $routeUpdateScore = 'admin/matches/update-score/' .$id;
                return redirect($routeUpdateScore)->with('message', 'Cập nhật tỷ số trận thành công!');
            }
    }
    public function isWin($home,$visitor){
            if($home > $visitor)
                return "home_win";
            if($home < $visitor)
                return "visitor_win";
            return "zero_zero";
        }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showUpdateView($id){

        $match = Match::find($id);
        if($match->role == "private")
            return view('admin.matches.update',['match' => $match]);

        return redirect()->route('match.index')->with('errors',"Trận đấu đang ở chế độ công bố. Không được phép sửa");
    }
    public function update(CreateMatchFormRequest $request, $id)
    {
        $arrayUpdate = $request->all();
        $deleteElemen = array_shift($arrayUpdate);

        //$match = Match::find($id);
        Match::where('role','private')->where('id', $id)->update($arrayUpdate);
        return redirect('admin/matches/listmatch')->with('message', 'Sửa trận thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countBet = Bet::where('match_id',$id)->count();
        if($countBet)
            return redirect()->route('match.index')->with('errors','Không được phép xóa trận này!');
        $match = Match::find($id);
        $match->delete();
        return redirect()->route('match.index')->with('message', 'Xóa trận thành công!');
    }

    public function changeRole($id){
        $match = Match::find($id);
        if($match->role == 'public')
            return redirect()->route('match.index')->with('errors','Không thể thay đổi được');
        Match::where('id',$id)->update(['role' => 'public']);
        return redirect()->route('match.index')->with('message','Trận đấu đã được công bố!');
    }

    public function getMatchDetail($id){
        $match = Match::find($id);
        $bets = DB::table('bets')
                ->where('match_id', $id)
                ->join('users','users.id','=','bets.user_id')
                ->select('bets.*','users.name','users.role')
                ->orderBy('choose_win')
                ->get();
        $routeMatchDetail = 'match/' .$id;
        return redirect($routeMatchDetail)->with('bets',$bets);
    }
}
