
<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title"><B>สมัครสมาชิก / Register</B></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/register', 'class'=>'form-register', 'name'=>'register', 'id'=>'register')) }}
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อผู้ใช้ / User Name:</span>
          {{ Form::text('username', null,  array('id'=>'username', 'class'=>'form-control', 'placeholder'=>'ชื่อผู้ใช้ / User Name')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> รหัสผ่าน / Password:</span>
          {{ Form::password('password',  array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'รหัสผ่าน / Password')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> ยืนยันรหัส / Re-Pass:</span>
          {{ Form::password('repassword',  array('id'=>'repassword', 'class'=>'form-control', 'placeholder'=>'ยืนยันรหัสผ่าน / Confirm Password')) }}
          </div>
           
            <!--<input type="submit" id="register" class="btn btn-large btn-primary btn-block" name="register" value="Register" disabled="disabled" />-->
            {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block','id'=>'register-button'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>



  