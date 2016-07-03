@extends('layouts.app')
@section('content')
<!--main-->
<?php 
    //dd($countDate);

 ?>
<section class="Maincont">
    <div class="container container-home">
        <div class="inner-page">
            <div class="nav-tab">


            </div>

            <div class="Contmid">
            <div class="headtext">Chọn một trận để tham gia</div>
                <div class="bxbit">
                @foreach($countDate as $countDate)
                <div class="bxbit">
                    <div class="rowbit">
                        <h2 class="date">{{date('l', strtotime($countDate->date))}} {{date('d-m-Y', strtotime($countDate->date))}}</h2>
                        @foreach($matches as $match) 
                            @if(strtotime(substr($match->time_begin,0,10)) == strtotime($countDate->date))
                                @if(strtotime($match->time_begin) >= time())
                                <div class="linebox clearfix  matchdetail" style="cursor: pointer" id="{{$match->id}}">
                                @else 
                                <div class="linebox clearfix " style="cursor: pointer" id="{{$match->id}}">
                                @endif
                                    <div class="bxtime">
                                        <span class="txt">A</span>
                                        <span class="time">{{date('h:ia', strtotime($match->time_begin))}}</span>
                                    </div>
                                    <div class="bxteamleft">
                                        <span class="nameteam select">{{$match->home_team}}</span>
                                    </div>
                                    <div class="bxflags">
                                        <span class="flags"><img src="images/phap.png"></span>
                                        <span class="point">{{$match->home_score }}: {{$match->visitor_score}}</span>
                                        <span class="flags"><img src="images/romania.png"></span>

                                    </div>
                                    <div class="bxteamright">
                                        <span class="nameteam select">{{$match->visitor_team}}</span>
                                        @if(strtotime($match->time_begin) >= time())
                                            <span class="countdown">{{\Carbon\Carbon::createFromTimeStamp(strtotime($match->time_begin))->diffForHumans()}} </span>
                                        @else 
                                            <span class="bittet">Đã diễn ra </span>
                                        @endif

                                    </div>                            
                                 </div> 
                            @endif
                        
                        @endforeach                        
                    </div>
                </div>
                    
                @endforeach

                </div>
            </div>
        </div>
    </div>

</section>


<script type="text/javascript">
    
 
</script>

@endsection
