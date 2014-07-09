<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">List of Subscribe</div>
        </div> 
        <div>
              {{--*/$i=1;/*--}}
            @foreach($subscribe_list as $subscribe_item)
            <div>
            	<span>{{$i}}.</span>{{$subscribe_item->subscribe_topic}}
            	<a href="{{URL::to('users/updatesubscribe',$subscribe_item->subscribe_id)}}">{{ Form::button('edit', array('class'=>'btn btn-default','id'=>'addnews-button'))}}</a>
            	<a href="{{URL::to('users/deletesubscribe',$subscribe_item->subscribe_id)}}">{{ Form::button('delete', array('class'=>'btn btn-default','id'=>'addnews-button'))}}</a>
            </div>		
		     {{--*/$i++;/*--}}
		   @endforeach
		</div>
   </div>
 </div>