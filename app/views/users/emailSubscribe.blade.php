<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Email Subscribe</div>
        </div>
        {{ Form::open(array('url'=>'users/emailsubscribe', 'class'=>'form-addsubscribe', 'name'=>'emailsubscribe', 'id'=>'emailsubscribe')) }} 
        <div>
        <div class="input-group">
            <span class="input-group-addon">E-mail<i class="glyphicon glyphicon-user"></i></span>
     {{ Form::text('email', null, array('id'=>'emailsub','class'=>'form-control', 'placeholder'=>'Enter E-mail')) }}
        </div>
        <div>
     {{ Form::submit('subscribe', array('class'=>'btn'))}}
				</div>
        {{ Form::close() }}
	</div>
   </div>
 </div>