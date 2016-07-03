@extends('layouts.app')

@section('content')
        <div class="navtab-users">
                <h2 class="subtitle">
                    <span>Admin Page</span>
                </h2>
                <ul class="menutab">
                    <li><a href="#">DS Trận đấu</a></li>
                    <li><a href="#">Tạo trận</a></li>
                    <li><a href="#">User</a></li>

                </ul>
        </div> 

@endsection
@yield('content')