<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">List of Subscribe</div>
        </div> 
        <div>
              {{--*/$i=1;/*--}}
            @foreach($subscribeuser_list as $subscribeuser_item)
            <div>
            	<span>{{$i}}.</span>{{$subscribeuser_item->subscribe_topic}}
            	{{$subscribeuser_item->email}} <a href="{{URL::to('users/deleteusersubscribe',$subscribeuser_item->subscribe_user_id)}}">{{ Form::button('delete', array('class'=>'btn btn-default','id'=>'addnews-button'))}}</a>
            </div>		
		     {{--*/$i++;/*--}}
		   @endforeach
		</div>
   </div>
 </div>