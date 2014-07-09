
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Admin Log In</div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/adminsignin', 'class'=>'form-signin')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	         {{ Form::text('username', null, array('id'=>'login-username','class'=>'form-control', 'placeholder'=>'Username')) }}
           </div>
           <div class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	        {{ Form::password('password', array( 'id'=>'login-password', 'class'=>'form-control', 'placeholder'=>'Password')) }}
          </div>
          <div class="input-group">
         </div>
	      {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  