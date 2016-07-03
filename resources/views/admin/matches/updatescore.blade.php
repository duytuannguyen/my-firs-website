@extends('layouts.app')

@section('content')

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
                                <span class="point">0 : 0</span>
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
                        <div class="bxseclbit">
                            <form action="{{url('admin/matches/update-score')}}/{{$match->id}}" method="post" accept-charset="utf-8" id="formbet">
                                {{csrf_field()}}

                                <div class="col" >
                                    <input type="text"  id="home_score" name="home_score" class="btbit" placeholder="0">
                                </div>
                                 <div class="col">
                                    <input type="text" " id="zero_zero" class="btbit" value=":">
                                </div>
                                 <div class="col">
                                    <input type="text" id="visitor_score" name="visitor_score" class="btbit" placeholder="0">
                                </div>
                                <div class="col" id="submit">
                                    <input type="submit" id="submit" class="btbit" value="OK">
                                </div>
                            </form>

                        </div>                      
                    </div>
                </div>
            </div>
        </div>
           
    </div>
    </div><!--end container-->   

</section>
@endsection

