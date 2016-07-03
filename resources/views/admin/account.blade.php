@extends('layouts.app')
@section('content')
<?php 
    //dd($account);
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
                    <p></p>
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
                                    <th>Tỷ số/th>
                                    <th>Kèo</th>
                                    <th>Tiền cược</th>
                                    <th>Tỷ lệ cược</th>
                                    <th>Tiền nhận được</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>25-06-2016</td>
                                    <td>20:00:29</td>
                                    <td>Thuy Sy - Ba Lan</td>
                                    <td>1:1</td>
                                    <td>Hoa</td>
                                    <td>10</td>
                                    <td>2.00</td>
                                    <td>(+)30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>25-06-2016</td>
                                    <td>20:00:29</td>
                                    <td>Thuy Sy - Ba Lan</td>
                                    <td>1:1</td>
                                    <td>Hoa</td>
                                    <td>10</td>
                                    <td>2.00</td>
                                    <td>Dang cap nhat</td>
                                </tr>
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