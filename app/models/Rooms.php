<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rooms extends Eloquent implements UserInterface, RemindableInterface {

	protected $guarded = array('roomID');

    protected $primaryKey = 'roomID';

    public $timestamps = false;

	protected $table = 'rooms';
    

	
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
   {
    return $this->remember_token;
   }

   public function setRememberToken($value) 
  {
    $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
    return 'remember_token';
  }
}