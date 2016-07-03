@extends('layouts.app')
@section('content')
<?php 
function isWin($home,$visitor){
    if($home > $visitor)
        return "home_win";
    if($home < $visitor)
        return "visitor_win";
    return "zero_zero";
}

//dd(isWin($recordBet[0]->home_score,$recordBet[0]->visitor_score));
?>
<section class="Maincont">

<!--Main-->
<section class="Maincont">
    
    <div class="banner-bread">
        <div class="inner-page clearfix">
            <div class="bxaccount">
                <div class="avatar">
                    <img src="{{url('images/avatar.png')}}" alt="Avatar">
                </div>
                <div class="info-user">
                    <p>Tài khoản</p>
                    <p><strong>{{$account->name}}</strong></p>
                    <p>Bạn có <strong id="point-store" style="color: #ffce01">{{$account->coin}}</strong> APV Coin</p>
                    <p>Thành viên</p>
                </div>
                <a class="logout text-uppercas" href="#">---------</a>
            </div>
            <div class="contbox">
                <div class="bxleft">
                    <img src="{{url('images/icon-bit.png')}}" alt="icon-bit">
                </div>
                <div class="bxright">
                    <h2><span>Dự đoán</span> <strong>Thật hay</strong></h2>
                    <p class="bxtext">
                        "Cùng tham gia dự đoán kết quả các trận đấu trên website để nhận được những phần quà thú vị từ chúng tôi nhé!"
                    </p>
                </div>
            </div>
        </div>
    </div><!--end banner-bread-->
    <div class="Container">
        <div class="inner-page">
            <div class="navtab-users">
                <h2 class="subtitle">
                    <span>Lịch sử dự đoán</span>
                </h2>
            </div>
            <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Ngày</th>
                                    <th>Giờ</th>
                                    <th>Trận đấu</th>
                                    <th>Tỷ số</th>
                                    <th>Kèo</th>
                                    <th>Tiền cược</th>
                                    <th>Tỷ lệ cược</th>
                                    <th>Tiền nhận được</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $countID=1; ?>
                                @foreach($recordBet as $bet)
                                <tr>
                                    <td>{{$countID}}</td>
                                        <?php $countID++; ?>
                                    <td>{{date('d-m-Y',strtotime($bet->time_begin))}}</td>
                                    <td>{{date('h:ia',strtotime($bet->time_begin))}}</td>
                                    <td>{{$bet->home_team}} : {{$bet->visitor_team}}</td>
                                    <td>{{$bet->home_score}} : {{$bet->visitor_score}}</td> 
                                    <!-- Keo -->
                                            @if($bet->choose_win == 'home_win')
                                                <td>{{$bet->home_team}} Thắng</td>
                                            @elseif($bet->choose_win == 'visitor_win')
                                                <td>{{$bet->visitor_team}} Thắng</td>
                                            @else
                                                <td>Hòa</td>
                                            @endif
                                    <!-- end-keo -->
                                    <td>{{$bet->coins_bet}}</td>
                                   <!--  ty le cuoc -->
                                            <?php  $rate = 1;?>
                                        @if($bet->choose_win == 'home_win')
                                            <?php  $rate = $bet->home_win;?>
                                            <td>{{$bet->home_win}}</td>
                                        @elseif($bet->choose_win == 'visitor_win')
                                            <?php  $rate = $bet->visitor_win;?>
                                            <td>{{$bet->visitor_win}}</td>
                                        @else
                                            <?php  $rate = $bet->zero_zero;?>
                                            <td>{{$bet->zero_zero}}</td>
                                        @endif

                                   <!--  end ty le cuoc -->
                                   
                                        @if($bet->process == 'check')
                                            <td>Đang xử lý...</td>
                                        @else
                                            @if($bet->choose_win == isWin($bet->home_score,$bet->visitor_score))
                                                
                                                <?php   $total = ($rate +1 ) * $bet->coins_bet; ?>
                                                <td>(+){{$total}}</td>
                                                
                                            @else
                                                <td>(+)0</td>
                                            @endif
                                        @endif
                                     <!-- end Tien nhan duoc -->

                                      
                                    </tr>     
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
</section>


    
</section>
@endsection