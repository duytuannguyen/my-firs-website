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
                    <li><a href="#">User</a></li>

                </ul>
        </div> 

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
	    	</div>
			@endif

			@if(Session::has('message'))
    			<div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      				{{Session::get('message')}}
   				</div>
			@endif
		</div>
	</div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>SỬA TRẬN</strong></div>
                <div class="panel-body">
                   <form class="form-horizontal" action="{{url('admin/matches/update')}}/{{$match->id}}" method="POST" role="form">
					
					           {{ csrf_field() }}

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Đội chủ nhà</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="home_team" name="home_team" value="{{$match->home_team}}">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Đội khách</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="visitor_team" name="visitor_team" value="{{$match->visitor_team}}">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Ngày/giờ diễn ra</label>
                           <div class="col-md-8">
                                <input type="datetime" class="form-control" id="time_begin" name="time_begin" value="{{$match->time_begin}}">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Ngày/giờ kết thúc</label>
                           <div class="col-md-8">
                                <input type="datetime" class="form-control" id="time_end" name="time_end" value="{{$match->time_end}}">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Chủ nhà thắng</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="home_win" name="home_win" value="{{$match->home_win}}">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Đội khách thắng</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="visitor_win" name="visitor_win" value="{{$match->visitor_win}}">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Hòa</label>
                           <div class="col-md-8">
                                <input type="text" class="form-control" id="zero_zero" name="zero_zero" value="{{$match->zero_zero}}">
                           </div>
                       </div>

                       <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> SỬA
                                    </button>
                                </div>
                        </div>
                       
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!--end container-->

    
</section>
@endsection
