<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AndroidController
 *
 * @author fendi
 */
class MyAdminController extends ParentController {
    var $is_admin=true;
    var $title="Admin";
    var $checkLogin=true;
    public $layout='//layouts/admin/main';
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        if(!Yii::app()->user->isLogin() && $id!='login' && $this->checkLogin){
             $this->redirect(Yii::app()->createUrl('pageadmin/login/login'));
        }
        if (!Yii::app()->user->isLogin() && $id != 'login' && $this->checkLogin) {
            $this->redirect(Yii::app()->createUrl('login/login'));
        }
        if(empty($_GET['ajax'])){
            $_GET['ajax']=0;
        }
    }
    function show_array($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

?>
