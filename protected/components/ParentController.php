<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParentController
 * 
 * @author fendi
 * @property SiaWebUser $user user yang sedang login
 */
class ParentController extends Controller{
    var $is_admin=false;
    var $user;
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        $cs = Yii::app()->clientScript;
        $cs->scriptMap = array(
            'jquery.js' => false,
            'bootstrap.js' => false,
            'bootstrap.css' => false,
            'bootstrap-yii.css' => false,
            'jquery.ba-bbq.js' => false,
        );
    }
    function render($view, $data = null, $return = false) {
            parent::render($view, $data, $return);
    }
    function renderModal($view,$data=array()){
        $param['view']   =$view;
        $param['data']   =$data;
        if(Helper::getQuery('ajax')==1)
            $this->renderPartial('//layouts/modal', $param);
        else {
            $this->render($view, $data);
        }
    }
    function renderRootContent($view,$data=array()){
        $this->layout='//layouts/rootContent';
        $this->render($view, $data);
        
    }
    /**
     * 
     * @param type $is_success
     * @param type $class_name
     * @param type $type create,update,delete
     */
    function notice($is_success,$class_name,$type){
        if($type=='create'){
            $message=($is_success)?'created':'create';
        }else if($type=='update'){
            $message=($is_success)?'updated':'update';
        }else if($type=='delete'){
            $message=($is_success)?'deleted':'delete';
        }
        
        if($is_success){
            Yii::app()->session['success']=$class_name." has $message successfully";
        }else{
            Yii::app()->session['failed']="Failed to $message $class_name";
        }
    }
    function noticeInfo($message){
        Yii::app()->session['info']=$message;

    }
    function notice2($is_success,$successMessage,$failedMessage){
        if($is_success){
            Yii::app()->session['success']=$successMessage;
        }else{
            Yii::app()->session['failed']=$failedMessage;
        }
    }
    function show_array($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    function datefmysql($tgl) {
        if ($tgl == '' || $tgl == null) {
            return "-";
        } else {
            $tgl = explode("-", $tgl);
            $new = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
            return $new;
        }
    }
    function date2mysql($tglParam){
        $new = null;
        $tgl = explode("/", $tglParam);
        if (empty($tgl[2]))
            return "";
//        echo strlen($tgl[2]);
        if(strlen($tgl[0])==4 && strlen($tgl[1])==2){
            return $tglParam;
        }
        $new = "$tgl[2]-$tgl[1]-$tgl[0]";
        return $new;
    }
}

?>
