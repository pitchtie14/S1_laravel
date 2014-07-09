<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Email Subscribe</div>
        </div>
        {{ Form::open(array('url'=>'users/deleteemailsubscribe/'.$subscribe_user_id, 'class'=>'form-addsubscribe', 'name'=>'deleteemailsubscribe', 'id'=>'emailsubscribe')) }} 
        <div>
        Do you want to delete already E-mail subscribe ?
        <div>
     {{ Form::submit('Delete', array('class'=>'btn'))}}
				</div>
        {{ Form::close() }}
	</div>
   </div>
 </div>