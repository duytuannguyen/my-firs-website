<?php use Carbon\Carbon; 
?>
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

            @if(Session::has('message'))
                <div class="alert alert-success fade in">
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
                                    <th>USER_ID</th>
                                    <th>Name</th>
                                    <th>EMAIL</th>
                                    <th>COIN</th>
                                    <th>ROLE</th>
                                    <th>CREATE_AT</th>
                                    <th>UPDATE_AT</th>
                                    <th>HISTORY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $countID = 1; ?>
                                @foreach($listAccount as $account)
                            	<tr>
                                    <td>{{$countID}}</td>
                                        <?php $countID++ ?>
                                    <td>{{$account->id}}</td>
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->email}}</td>
                                    <td>{{$account->coin}}</td>
                                    <td>{{$account->role}}</td>
                                    <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($account->created_at))->diffForHumans() !!}</td>
                                    <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($account->updated_at))->diffForHumans() !!}</td>
                                    <td><a href="{{url('admin/account/')}}/{{$account->id}}" title="">Xem</a></td>
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
