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
    var $param=array();
    var $orderDetailForMainView=array();
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        Yii::app()->theme = "shopfine";
        if (empty($_GET['ajax'])) {
            $_GET['ajax'] = null;
        }
        $this->orderDetailForMainView=  OrderDetail::model()->getDetailOrder($this->getOrderId());
    }
    function render($view, $data = null, $return = false) {
        parent::render($view, $data, $return);
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

    function isUserLogin(){
        return true;
    }
    function pageForCustommerOnly($returnUrl='',$param=array()){
        if(Helper::getUserLogin()->isCustommer()){
            return true;
        }else{
            $this->noticeInfo("Anda harus login untuk mengakses halaman ini");
            $this->redirect(Yii::app()->createUrl('user/login',array('returnUrl'=>  Yii::app()->createUrl($returnUrl,$param))));
        }
    }
    public function getOrderId($isCreateNewOrder=false){
        $order=$this->getOrder($isCreateNewOrder);
        if($order==null) return null;
        else
        return $order->id;
    }
    /**
     * 
     * @return Order
     */
    public function getOrder($isCreateNewOrder=false){
        if(Yii::app()->session['id_order']==null && $isCreateNewOrder){
            $order=new Order();
            if(Helper::getUserLogin()->isLogin() && Helper::getUserLogin()->isCustommer()){
                $custommer=  Helper::getUserLogin()->getUserProfile();
                $order->id_custommer=$custommer->id;
            }
            $order->save(false);
            Yii::app()->session['id_order']=$order->id;
        }else{
            $order= Order::model()->findByPk(Yii::app()->session['id_order']);
            if($order==null && $isCreateNewOrder){
                Yii::app()->session['id_order']=null;
                return $this->getOrder($isCreateNewOrder);
            }
        }
        return $order;
    }
    /**
     * 
     * @param type $tagihan
     */
    public function updateTotalTagihanOrder($tagihan){
        $order=$this->getOrder();
        $order->total_tagihan+=$tagihan;
        if($tagihan>0){
            $order->waktu = new CDbExpression('NOW()');
        }
        return $order->save(false);
    }
    public function clearOrder(){
        if(Yii::app()->session['id_order']!=null){
            $order=  Order::model()->findByPk(Yii::app()->session['id_order']);
            $order->delete();
        }
        Yii::app()->session['id_order']=null;
    }
}

?>
