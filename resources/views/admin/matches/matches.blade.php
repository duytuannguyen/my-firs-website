@extends('layouts.app')

@section('content')
<!--Main-->
<section class="Maincont">

<div class="Container">
    
        <div class="navtab-users">
                <h2 class="subtitle">
                    <span>Admin Page</span>
                </h2>
                <ul class="menutab">
                    <li><a href="{{route('match.index')}}">DS Trận đấu</a></li>
                    <li><a href="{{route('match.create')}}">Tạo trận</a></li>
                    <li><a href="{{route('account.getList')}}">User</a></li>

                </ul>
        </div> 

            <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @if(Session::has('errors'))
                <div class="alert alert-danger fade in text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{Session::get('errors')}}
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
 <div class="contmid">
                <div class="bxcont">
                    <div class="croll_tb">
                        <table class="table table-hover" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Trận</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Home</th>
                                    <th>Hòa</th>
                                    <th>Visitor</th>
                                    <th>SL</th>
                                    <th>Tỷ số</th>
                                    <th>Default</th>
                                    <th>Trạng thái</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                    <th>Xem</th>

                                </tr>
                            </thead>
                            <?php $countID = 1; ?>
                            <tbody>
                            	@foreach($matches as $match)
                            	<tr>
                                    <td>{{$countID}}</td>
                                    <?php $countID++; ?>
                                    <td>{{$match->home_team}} - {{$match->visitor_team}}</td>
                                    <td>{{$match->created_at}}</td>    
                                    <td>{{$match->time_begin}}</td> 
                                    <td>{{$match->home_win}}</td>
                                    <td>{{$match->zero_zero}}</td>
                                    <td>{{$match->visitor_win}}</td>
                                    <td>{{$match->sl}}</td>
                                    <td>{{$match->home_score}} - {{$match->visitor_score}}</td>
                                    <td><button  type="button" onclick="show_confirm({{$match->id}})">{{$match->role}}</button></td>
                                    @if($match->process == "checked")
                                        <td>Đã cập nhật</td>
                                    @else 
                                        <td><a href="{{url('admin/matches/update-score')}}/{{$match->id}}"  title="cập nhật">Cập nhật</a></td>
                                    @endif
                                    <?php $match_id = $match->id ?>
                                    <td><a href="{{url('admin/matches/update')}}/{{$match->id}}"  title="sua">Sửa</a></td>
                                    <td><button onclick="show_confirm_delete({{$match->id}})" title="xoa">Xóa</button></td>
                                    <td><a href="{{url('admin/matches/matchdetail/')}}/{{$match->id}}" title="Xem chi tiết" >Xem chi tiết</a></td>
                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
    </div><!--end container-->


    
</section>
@endsection
