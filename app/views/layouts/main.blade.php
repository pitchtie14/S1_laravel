<!DOCTYPE html>
<html data-ng-app="app" lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>{{{@($title) ? $title : "S1 Living on your style"}}}</title>

    	{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
      {{ HTML::style('packages/bootstrap/css/styles.css') }}
      {{ HTML::script('//code.jquery.com/jquery-1.10.2.min.js') }}
    	{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

      {{ HTML::style('users/css/datepicker.css') }}
  	</head>

  	<body>

	  	<div class="navbar navbar-inverse">
		  	<div class="navbar-inner">
		    	<div class="container">
		    		<div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                      </button>
                   </div>
                   <div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">  
						 <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						@if(!Auth::check())
             <li><a href="{{URL::to('users/adminlogin')}}"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
					    @endif 
            @if(Auth::check() && Auth::user()->userTypeID === 1)
             <li><a href="{{URL::to('users/rooms')}}"><i class="glyphicon glyphicon-lock"></i> Rooms list</a></li>
              @endif
            @if(Auth::check() && Auth::user()->userTypeID === 2)
             <li><a href="{{URL::to('users/rooms')}}"><i class="glyphicon glyphicon-lock"></i> Rooms list</a></li>
              @endif  
            @if(Auth::check() && Auth::user()->userTypeID === 1)
             <li><a href="{{URL::to('users/register')}}"><i class="glyphicon glyphicon-lock"></i> Add User</a></li>
              @endif 
					</ul>  
					<!--

            -->
                    @if(Auth::check())
             <div class="pull-right">
                       <ul class="nav navbar-nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                          <span style="color:#FFF; font-weight: bold;">Welcome: </span>
                            <span style="color:#F00;">{{Auth::user()->username}}</span> 
                          <span style="color:#FFF; font-weight: bold;">Type: </span>
                            <span style="color:#F00;">
                            @if (Auth::user()->userTypeID === 1) Admin 
                            @elseif (Auth::user()->userTypeID === 2) Attendent
                            @elseif (Auth::user()->userTypeID === 3) Guest
                            @endif
                            </span>
                          <span style="color:#FFF; font-weight: bold;">Room: </span>
                            <span style="color:#F00;">
                            @if (Auth::user()->roomName) {{Auth::user()->roomName}}
                            @endif
                            </span>
                          <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                            <li><a href="{{URL::to('users/logout')}}"><i class="icon-off"></i> Logout</a></li>
                           </ul>
                        </li>
                       </ul>
                     </div>
                    @endif
                   </div>

                <!--
                 -->
		    	</div>
		  	</div>
		</div> 	            
       <div class="wrapper">
	    <div class="container">
	    	@if(Session::has('message'))
	    	    <div class="alert alert-{{Session::has('message-type') ? Session::get('message-type') : 'success' }} col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{ Session::get('message') }}</p>
            </div>
			@endif

       @if($errors->has())
            <div class="alert alert-danger col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
            </div>
         @endif
	    </div>
	    <div class="container">
            {{ @$content }}
	    </div>
	  </div>

  	</body>

</html>
