<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Add Subscribe</div>
        </div> 
        <div>
 		{{ Form::open(array('url'=>'users/addsubscribe', 'class'=>'form-addsubscribe', 'name'=>'addsubscribe', 'id'=>'addsubscribe')) }}
 		<div>&nbsp;</div>
		  <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i> หัวข้อ / Header :</span>
          {{ Form::text('subscribe_topic', null,  array('id'=>'subscribe_topic', 'class'=>'form-control', 'placeholder'=>'หัวข้อ / Header ')) }}
          </div>
		  <div class="input-group">
             <span class="input-group-addon"> รายละเอียด / Detail : </span>
          {{ Form::textarea('subscribe_detail', '',array(
              'id'      => 'subscribe_detail'
              ,'rows'    => 10
              ,'class'=>'form-control'
          ))}}
          </div>		
		  {{ Form::submit('Add News', array('class'=>'btn btn-large btn-primary btn-block','id'=>'addnews-button'))}}
		{{ Form::close() }}
		</div>
   </div>
 </div>