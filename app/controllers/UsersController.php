<?php

class UsersController extends BaseController {

  protected $layout = "layouts.main";

  /*
  |--------------------------------------------------------------------------
  | Default Home Controller
  |--------------------------------------------------------------------------
  |
  | You may wish to use controllers instead of, or in addition to, Closure
  | based routes. That's great! Here is an example controller method to
  | get you started. To route to this controller, just add the route:
  |
  | Route::get('/', 'HomeController@showWelcome');
  |
  */
  public function __construct() { // check not login

    $this->beforeFilter('auth', array('only'=>array('getRooms','getRegister','getUpdateroom','getAddsubscribe','getSubscribecomplete','getUpdatesubscribe','getDeletesubscribe','getLogout')));

  }

  public function showWelcome()
  {
    return View::make('hello');
  }

  public function getAdminlogin() {
  if(!Auth::check()) {
    $this->layout->content = View::make('users.adminlogin');
   } else {
    return Redirect::to('users/listusersubscribe');
   }
  }

  public function postAdminsignin() {
       //set data from input
       $inputdata = array(
      'username' => Input::get('username'),
      'password' => Input::get('password')
    );
  
  // Declare the rules for the form validation.
    $rules = array(
      'username'  => 'Required',
      'password'  => 'Required'
    );

    // Validate the inputs.
    $validator = Validator::make($inputdata, $rules);

        if ($validator->passes())
    {

     if (Auth::attempt($inputdata)) {

      if(Auth::user()->userTypeID === 1){
        return Redirect::to('users/rooms')->with('message', 'Admin are now logged in!');
      }
      elseif(Auth::user()->userTypeID === 2){
        return Redirect::to('users/rooms')->with('message', 'Attendent are now logged in!');
      } 
      elseif(Auth::user()->userTypeID === 3){
        return Redirect::to('users/rooms')->with('message', 'Guest are now logged in!');
      }                                        //->with('message-type','warning');
     } else {

           
      return Redirect::to('users/adminlogin')
        ->withErrors(array('Admin username or password is incorrect'))
        ->withInput(Input::except('password'));
        }
      } else {
        return Redirect::to('users/adminlogin')
            ->withInput()
            ->withErrors($validator);
        //return Redirect::to('users/login')->with('error')->withInput(Input::except('password'));
      }
  }

  public function getRooms() {
      $rooms = rooms::all();
     
      $this->layout->content = View::make('users.rooms',compact('rooms'));
  }

  public function getRegister() {
   if(Auth::user()->userTypeID === 1) {
      $this->layout->content = View::make('users.register');
   } else {
      return Redirect::to('users/rooms');
   }
       $this->beforeFilter( Auth::user()->userTypeID === 1 , array('only'=>array('getRegister')));   
  }

  public function postRegister(){

    //Input::merge(array_map('trim', Input::all()));
    $input = Input::all();

    $rules = array(
      'username' => 'required',
      'password' =>'required',
      'repassword' =>'required'
      );

    $this->error_messages = array(
    );

    $v = Validator::make($input, $rules, $this->error_messages);

    if($v->passes()){
      $password = $input['password'];
      $password = Hash::make($password);

      $user = new Users();
      $user->username = $input['username'];
      $user->password = $password;
      $user->userTypeID = 2;
      $user->save();

      return Redirect::to('users/rooms');

    }else{

      return Redirect::to('users/register')->withInput(Input::except('password,repassword'))->withErrors($v);

    }
  }

  public function getRoomdetails($roomID) {
      $rooms = rooms::find($roomID);

      $this->layout->content = View::make('users.roomdetails',compact('rooms'));
  } 

  public function getUpdateroom($roomID) {
      $rooms = rooms::find($roomID);
      //$roomstatus_selector = Roomstatus::makeRoomstatus();

     $this->layout->content = View::make('users.updateroom',compact('rooms'));
     //$this->layout->content = View::make('users.updateroom',compact('rooms'),array('statusID'=>$roomstatus_selector));
  }

  public function postUpdateroom($id){
  $input = Input::all();

    $rules['typeID'] = 'required';
    $rules['ststusID'] = 'required';

        $v = Validator::make($input, $rules);

    if($v->passes()){
      $rooms = rooms::find($id);

      $rooms->typeID = $input['typeID'];
      $rooms->ststusID = $input['ststusID'];
      $rooms->ect = $input['ect'];
      $rooms->update();
       return Redirect::to('users/rooms/'.$id);
   
      }else{

      return Redirect::to('users/updateroom/'.$id)->withInput()->withErrors($v);

    }
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::to('users/adminlogin')->with('message', 'You are now logged out!')
                                      ->with('message-type','warning');
  }








  public function getListusersubscribe() {
      $subscribeuser_list = subscribeuser::all();

      $this->layout->content = View::make('users.listusersubscribe',compact('subscribeuser_list'));
  }

  public function getListsubscribe() {
      $subscribe_list = subscribe::all();
     
      $this->layout->content = View::make('users.listsubscribe',compact('subscribe_list'));
  } 

  public function getAddsubscribe() {
      $this->layout->content = View::make('users.addsubscribe');
  }

   public function getEmailsubscribe() {
      $this->layout->content = View::make('users.emailsubscribe');
  }

  public function getSubscribecomplete() {
      $this->layout->content = View::make('users.subscribecomplete');
  }

  public function getDeletesubscribe($id)
  {
    
      Subscribe::find($id)->delete();
        return Redirect::to('users/listsubscribe');
  }

  public function postDeleteemailsubscribe($email)
  {
      
      Subscribeuser::find($email)->delete();
        return Redirect::to('users/subscribecomplete');
  }

  public function getDeleteusersubscribe($id)
  {
    
      Subscribeuser::find($id)->delete();
        return Redirect::to('users/listusersubscribe');
  }

  public function getDeleteemailsubscribe($subscribe_user_id) {
      $this->layout->content = View::make('users.deleteemailsubscribe',array('subscribe_user_id'=>$subscribe_user_id));
  }

  public function postUpdateprofile(){
    $input = Input::all();

    $password = $input['password'];
    $current_password = $input['current-password'];

    $rules['firstname'] = 'required';
    $rules['address'] = 'required';
    $rules['province'] ='required';
    $rules['zipcode'] = 'required|size:5|regex:/\d{5}$/';
    $rules['tel'] = 'regex:/^0[0-9]{8,9}$/i';
    $rules['birthday'] = 'date_format:Y-m-d';

        
        if($input['email']!=Auth::user()->email) {
          $rules['email'] = 'unique:users|email';
        }
        
        if($password !="" || !empty($password)) {
         $rules['password'] = 'regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/';
         $rules['current-password'] = 'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/';
        }

        
       // echo Input::file('image');

        //die();

        $v = Validator::make($input, $rules, $this->error_messages);

    if($v->passes()){
      $user = Users::find(Auth::user()->user_id);

      $user->firstname = $input['firstname'];
      $user->lastname = $input['lastname'];
      $user->email = $input['email'];
      $user->tel = $input['tel'];
      $user->address = $input['address'];
      $user->province_id = $input['province'];
      $user->zipcode = $input['zipcode'];
      $user->birthdate = $input['birthday'];
      //$user->profile_image = $input['profile_image'];
      $file_uploaded = Input::file('image');
      if($password !="" || !empty($password)) {
      $password = Hash::make($password);
      $user->password = $password;
      $is_changed_pw = true;
      } 

    }else{

      return Redirect::to('users/editprofile')->withInput()->withErrors($v);

    }
  }

  public function postAddsubscribe(){
    //Input::merge(array_map('trim', Input::all()));
    $input = Input::all();
    $rules = array(
      'subscribe_topic' => 'required',
      'subscribe_detail' => 'required'
      );
    $this->error_messages = array(
    
    );
    $v = Validator::make($input, $rules, $this->error_messages);
    if($v->passes()){
      
      $subscribe = new Subscribe();
      $subscribe->subscribe_topic = $input['subscribe_topic'];
      $subscribe->subscribe_detail = $input['subscribe_detail'];
      $subscribe->datetime = date('Y-m-d H:i:s');
      $subscribe->save();
      return Redirect::to('users/listsubscribe');
    }else{
      return Redirect::to('users/addsubscribe')->withInput(Input::except('subscribe_topic,subscribe_detail'))->withErrors($v);
    }
  }

  public function postEmailsubscribe(){

    $input = Input::all();

    $rules = array(
      'email' => 'required|unique:subscribeuser|email'
      );
  

    $this->error_messages = array(
      
    );

    $v = Validator::make($input, $rules, $this->error_messages);
      if($v->passes()){

        $email = new Subscribeuser();
        $email->email = $input['email'];
        $email->datetime = date('Y-m-d H(idea)(worry)');
        $email->save();

        return Redirect::to('users/subscribecomplete');

      }else{
        $subscribeuser = Subscribeuser::where('email','=',$input['email'])->first();

        return Redirect::to('users/deleteemailsubscribe/'.$subscribeuser->subscribe_user_id);

      }
    }


}