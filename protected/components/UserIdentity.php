<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        var $type='';
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($loginType='admin')
	{
            if($loginType=='admin'){    
                $user=Yii::app()->getDb()
                        ->createCommand()
                        ->select()
                        ->from('admin')
                        ->where("username='".$this->username."'")
                        ->queryRow();
                $this->type='admin';
            }else{
                $user=Yii::app()->getDb()
                        ->createCommand()
                        ->select()
                        ->from('custommer')
                        ->where("username='".$this->username."'")
                        ->queryRow();
                $this->type='custommer';
            }
		if(!isset($user['username']))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(($user['password'])!==md5($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}