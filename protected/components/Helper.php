<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author fendi
 */
class Helper {
    public static function rupiah($nominal,$withRp=true){
        $rupiah = number_format($nominal, 0, ",", ".");
        if($withRp)
            $rupiah = "Rp " . $rupiah . ",-";
        return $rupiah;
    }
    /**
     * 
     * @param type $message pesan yang mau ditampilkan
     * @param type $type 'error','danger','info','success'
     */
    public static function alert($message,$type){
        echo "<div class='alert alert-$type'>$message</div>";
    }
    public static function getQuery($name,$defaultValue=null){
         return Yii::app()->request->getQuery($name, $defaultValue);
    }
    
    public static function generateGetParam($data){
        $result='';
        foreach($data as $i=>$d){
            if($result!=''){
                $result.="&";
            }
            $result.="$i=$d";
        }
        return $result;
    }
    /**
     * 
     * @return SiaWebUser
     */
    public static function getUserLogin(){
        return Yii::app()->user;
    }
    public static function getTitleList(){
        return array(
            'Tuan'=>'Tuan',
            'Nyonya'=>'Nyonya',
            'Nona'=>'Nona',
        );
    }
}

?>
