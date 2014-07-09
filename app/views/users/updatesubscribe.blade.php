<p><b>Edit Subscribe data</b></p>
<div class="row">
  {{ Form::open(array('url'=>'users/updatesubscribe/'.$subscribe->subscribe_id, 'class'=>'form-updatesubscribe','enctype'=>'multipart/form-data')) }}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                
                <div class="col-sm-6 col-md-6">
                                      
                        

                         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Header :</span>
                          {{ Form::text('subscribe_topic', $value = $subscribe->subscribe_topic, array('id'=>'subscribe_topic','class'=>'form-control')) }}
                         </div>
                        
                         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Detail :</span>
                          {{ Form::textarea('subscribe_detail', $subscribe->subscribe_detail,array(
                              'id'      => 'subscribe_detail'
                              ,'rows'    => 10
                              ,'class'=>'form-control'
                          ))}}
                         </div>
                        
                       <!-- Start Profile Pic -->    
                </div>
                
                    
                </div>
            </div>
           <div class="input-group">{{ Form::submit('Edit Subscribe', array('class'=>'btn btn-primary btn-lg'))}}
           </div>

    </div>
    {{ Form::close() }}
</div>