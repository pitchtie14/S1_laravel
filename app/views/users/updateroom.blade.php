<p><b>Edit Room Data</b></p>
<div class="row">
  {{ Form::open(array('url'=>'users/updateroom/'.$rooms->roomID, 'class'=>'form-updateroom','enctype'=>'multipart/form-data')) }}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                
                <div class="col-sm-6 col-md-6">
                                      
                        

                         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Room Type :</span>
                          {{ Form::select('typeID', array('1' => 'Single room F1', '2' => 'Single room F2', '3' => 'Single room F3', '4' => 'Single room F4', '5' => 'Twin room F2', '6' => 'Twin room F3', '7' => 'Suite room'), $rooms->typeID,array('class'=>'form-control')) }}
                         </div>
                        
                         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Room Status :</span>
                          {{ Form::select('ststusID', array('1' => 'Vacancies', '2' => 'No vacancies D', '3' => 'No vacancies M', '4' => 'Repairing'), $rooms->ststusID,array('class'=>'form-control')) }}
                         </div>

                         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Ect. </span>
                         {{ Form::textarea('ect', $rooms->ect,array(
                              'id'      => 'ect'
                              ,'rows'    => 10
                              ,'class'=>'form-control'
                          ))}}
                          </div>                       

                </div>
                
                    
                </div>
            </div>
           <div class="input-group">{{ Form::submit('Edit Room Data', array('class'=>'btn btn-primary btn-lg'))}}
           </div>

    </div>
    {{ Form::close() }}
</div>