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
        $apiSecretKey = "d87f4147e65331b988555946df8a077f";
        $content = file_get_contents("https://api.master18.tiket.com/apiv1/payexpress?method=getToken&secretkey=$apiSecretKey&output=json");
        $content = json_decode($content, true);
        return $content['token'];
    }

    function requestAPI($url) {
        $token = $this->generateToken();
//        echo $url."&token=$token&output=json";
        $result = file_get_contents($url . "&token=$token&output=json");
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
}

?>
