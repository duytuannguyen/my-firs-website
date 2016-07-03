@extends('layouts.app')

@section('content')
<?php 
    //dd(Session::get('bets'));
 ?>
 <?php
   //$listBet = Session::get('bets');
   // dd($listBet);
?>
<!--Main-->
<section class="Maincont">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger fade in text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{Session::get('error')}}
                        </div>
                    @endif

                    @if(Session::has('message'))
                        <div class="alert alert-success fade in text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
            </div>
    <div class="Container">
        <div class="inner-page">
            <div class="contmid">
                <div class="headtext">Chi tiết trận đấu:</div>
                 <div class="bxbit">
                    <div class="rowbit">
                        <h2 class="date"> {{date('d-m-Y',strtotime($match->time_begin))}}</h2>
                        <div class="linebox clearfix">
                            <div class="bxtime top bxtime-user">
                                <span class="txt">A</span>
                                <span class="time">{{date('h:i a',strtotime($match->time_begin))}}</span>
                            </div>

                            <div class="bxteamleft">
                                <span id="home_team" class="nameteam">{{$match->home_team}}</span>
                            </div>
                            <div class="bxflags">
                                <span class="flags">
                                    <img src="{{url('images/phap.png')}}" alt="PHAP">
                                </span>
                                <span class="point">{{$match->home_score}}: {{$match->visitor_score}}</span>
                                <span class="flags">
                                    <img src="{{url('images/romania.png')}}" alt="Romania">
                                </span> 
                            </div>
                            <div class="bxteamright">
                                <span id="visitor_team" class="nameteam">{{$match->visitor_team}}</span>
                                @if(strtotime($match->time_begin) >= time())
                                <span class="countdown">{{\Carbon\Carbon::createFromTimeStamp(strtotime($match->time_begin))->diffForHumans()}} </span>
                                @else 
                                    <span class="bittet">Đã diễn ra </span>
                                @endif
                            </div>
                        </div>


                        @if(strtotime($match->time_begin) >= time())
                        <div class="bxseclbit">
                            <form action="{{url('bet')}}" method="post" accept-charset="utf-8" id="formbet">
                                {{csrf_field()}}
                                <input type="hidden" name="choose_win" id="choose_win" value="">
                                <input type="hidden" name="match_id" value="{{$match->id}}">
                                <div class="col" id="col_home_win">
                                    <input type="button" onclick="bet('home_win')" id="home_win" class="btbit" value="{{$match->home_win}} Thắng">
                                </div>
                                 <div class="col" id="col_zero_zero">
                                    <input type="button" onclick="bet('zero_zero')" id="zero_zero" class="btbit" value="{{$match->zero_zero}} Hòa">
                                </div>
                                 <div class="col" id="col_visitor_win">
                                    <input type="button" onclick="bet('visitor_win')" id="visitor_win" class="btbit" value="{{$match->visitor_win}} Thua">
                                </div>
                            </form>

                        </div>
                        @else 
                        <div class="bxseclbit bxa">
                            <form action="{{url('bet')}}" method="post" accept-charset="utf-8" id="formbet">
                                {{csrf_field()}}
                                <input type="hidden" name="choose_win" id="choose_win" value="">
                                <input type="hidden" name="match_id" value="{{$match->id}}">
                                <div class="col" id="col_home_win">
                                    <input type="button" id="home_win" class="btbit" value="{{$match->home_win}} Thắng">
                                </div>
                                 <div class="col" id="col_zero_zero">
                                    <input type="button"  id="zero_zero" class="btbit" value="{{$match->zero_zero}} Hòa">
                                </div>
                                 <div class="col" id="col_visitor_win">
                                    <input type="button"  id="visitor_win" class="btbit" value="{{$match->visitor_win}} Thua">
                                </div>
                            </form>

                        </div>
                        @endif

                        <div class="bxseclbit">
                            <div class="col">
                                <input type="button" name="bet_home" class="btbit" value="{{$countBet['betHome']}}">
                            </div>
                            <div class="col">
                                <input type="button" name="bet_zero_zero" class="btbit" value="{{$countBet['betZero_Zero']}}">
                            </div>
                            <div class="col">
                                <input type="button" name="bet_home" class="btbit" value="{{$countBet['betVisitor']}}">
                            </div>
                            
                        </div>
                        

                        
                    </div>
                </div>
            </div>
        </div>
           
    </div>
    </div><!--end container-->   

</section>
@endsection

