<?php

class Roomstatus extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey = 'statusID';

 public static function makeRoomstatus() {
 	$roomstatuss = self::all();

    $roomstatus_selector[0] = 'เลือกสถานะห้องพัก';

    foreach($roomstatuss as $roomstatus) {
      $statusID = $roomstatus['statusID'];
      $roomstatus_selector[$statusID]=$roomstatus['statusName'];   
     }

     return $roomstatus_selector;
 }
}