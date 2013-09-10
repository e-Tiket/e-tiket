<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author fendi
 * @property SiaWebUser $user user yang login 
 */
class MyController extends ParentController {

    var $title = "Sistem Reservasi Futsal";
    var $checkLogin = true;
    var $tahunAjaran = "";

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        Yii::app()->theme = "shopfine";
        if (empty($_GET['ajax'])) {
            $_GET['ajax'] = null;
        }
    }

    function init() {
        parent::init();
    }

    function generateToken() {
        $apiSecretKey = "510cde17096c924535f37e10ce795d4c";
        $content = file_get_contents("https://api.master18.tiket.com/apiv1/payexpress?method=getToken&secretkey=$apiSecretKey&output=json");
        $content = json_decode($content, true);
        return $content['token'];
    }

    function requestAPI($url) {
        $token = $this->generateToken();
        $result = @file_get_contents($url . "&token=$token&output=json");
        if($result==false)    
            return null;
//        echo $result.'<br>';
        return json_decode($result, true);
    }

    public function isAdmin() {
        return Yii::app()->user->isAdmin();
    }

    public function isGuru() {
        return Yii::app()->user->isGuru();
    }

    function rupiah($nominal) {
        return Helper::rupiah($nominal);
    }
    
    function isLogin(){
        return true;
    }
    function pageForCustommerOnly($returnUrl='',$param=array()){
        if(Helper::getUserLogin()->isCustommer()){
            return true;
        }else{
            $this->noticeInfo("Anda harus login untuk mengakses halaman ini");
            $this->redirect(Yii::app()->createUrl('user/login',array('urlReturn'=>  Yii::app()->createUrl($returnUrl,$param))));
        }
    }
}

?>
