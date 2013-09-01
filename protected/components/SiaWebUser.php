<?php
class SiaWebUser extends CWebUser{
        const ADMIN=1;//konstanta ini untuk level
        const MEMBER=0;
        static $profile=array();
        
        public function getLevel(){
                $user=User::model()->findByPk($this->id);
                if($user)
                        return $user->LEVEL;
        }

        public function isLogin(){
            return $this->getUsername()!=null;
        }
        public function isAdmin(){
            return $this->getUserType()=='admin';
        }
        public function isCustommer(){
            return $this->getUserType()=='custommer';
        }
        public function getUserType(){
            return $this->getState('__type');
        }
        
        /**
         * 
         * @return Custommer
         */
        public function getUserProfile(){
            if(count(SiaWebUser::$profile)==0){
                if($this->isAdmin())
                    SiaWebUser::$profile=Admin::model()->findByAttributes(array('username'=>$this->getUsername()));
                else{
                    SiaWebUser::$profile=Custommer::model()->findByAttributes(array('username'=>$this->getUsername()));
                }
            }
            return SiaWebUser::$profile;
        }
        public function getUsername() {
            return $this->getState('__username');
        }
        public function getUserId(){
            $profile=  $this->getUserProfile();
            return $profile->id;
        }
        /**
         * @param UserIdentity $identity
         * @param Integer $duration
         * @return boolean
         */
        public function login($identity,$duration=0)
	{
            $act=parent::login($identity, $duration);
            $this->setState('__type', $identity->type,$identity->getPersistentStates());
            $this->setState('__username', $identity->username,$identity->getPersistentStates());
            return $act;
	}
}
?>