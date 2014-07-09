<div class="mainbox col-md-12 col-sm-12">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">List of Rooms</div>
        </div>
        <table class="table table-bordered table-striped" border="0" width="100%"> 
        <div>
            <tr height="50">
                <div class="col-xs-3 col-centered">
                    <td align="center" style="background-color:#DDD !important;">
                        <B>ห้อง</B>
                    </td>
                    <td align="center" style="background-color:#DDD !important;">
                        <span>
                            <B>สถานะห้องพัก</B>
                        </span>
                    </td>
                    <td align="center" style="background-color:#DDD !important;">
                        <span>
                            <B>ประเภทห้องพัก</B>
                        </span>
                    </td>
                    <td align="center" style="background-color:#DDD !important;">
                        <span>
                            <B>อื่น ๆ</B>
                        </span>
                    </td>
                    <td align="center" style="background-color:#DDD !important;">
                        <span>
                            <B>แก้ไข</B>
                        </span>
                    </td>
                </div>
            </tr>  
              {{--*/$i=1;/*--}}
            @foreach($rooms as $room)
            <tr>
                <div class="col-xs-3 col-centered">
                        <td align="center">
                            <span>
                            <B><a href="{{URL::to('users/roomdetails',$room->roomID)}}">{{$room->roomName}}</a></B>
                            </span>
                        </td>
                    @if ($room->ststusID === 1)
                        <td align="center" style="color: #0F0;font-weight: bold;">
                            <span>
                            ห้องพักยังว่าง
                            </span>
                        </td>
                    @elseif ($room->ststusID === 2)
                        <td align="center" style="color: #FC0;font-weight: bold;">
                            <span>
                            มีแขกพักแบบรายวัน
                            </span>
                        </td>
                    @elseif ($room->ststusID === 3)
                        <td align="center" style="color: #F00;font-weight: bold;">
                            <span>
                            มีแขกพักแบบรายเดือน
                            </span>
                        </td>
                    @elseif ($room->ststusID === 4)
                        <td align="center" style="color: #AAA;font-weight: bold;">
                            <span>
                            ห้องพักกำลังซ่อมแซม
                            </span>
                        </td>
                    @endif
                    
                    @if ($room->typeID === 1)
                        <td align="center">
                            <span style="color: #06F;font-weight: bold;">
                            Single room F1
                            </span>
                        </td>
                    @elseif ($room->typeID === 2)
                        <td align="center">
                            <span style="color: #8A0;font-weight: bold;">
                            Single room F2
                            </span>
                        </td>
                    @elseif ($room->typeID === 3)
                        <td align="center">
                            <span style="color: #C8C;font-weight: bold;">
                            Single room F3
                            </span>
                        </td>
                    @elseif ($room->typeID === 4)
                        <td align="center">
                            <span style="color: #0CF;font-weight: bold;">
                            Single room F4
                            </span>
                        </td>
                    @elseif ($room->typeID === 5)
                        <td align="center">
                            <span style="color: #AAA;font-weight: bold;">
                            Twin room F2
                            </span>
                        </td>
                    @elseif ($room->typeID === 6)
                        <td align="center">
                            <span style="color: #555;font-weight: bold;">
                            Twin room F3
                            </span>
                        </td>
                    @elseif ($room->typeID === 7)
                        <td align="center">
                            <span style="color: #FC0;font-weight: bold;">
                            Suite room
                            </span>
                        </td>
                    @endif
                    
                    <td align="center">
                        <span>
                            {{$room->ect}}
                        </span>
                    </td>     
                    <td align="center">
                        <span>
                        	<a href="{{URL::to('users/updateroom',$room->roomID)}}">{{ Form::button('edit', array('class'=>'btn btn-default','id'=>'addnews-button'))}}</a>
                        </span>
                    </td>
                </div>
            </tr>		
		     {{--*/$i++;/*--}}
		   @endforeach
		</div>
        </table>
   </div>
 </div>