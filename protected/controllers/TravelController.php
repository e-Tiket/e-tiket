<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlightController
 *
 * @author fendi
 */
class TravelController extends MyController{
    public function actionOrderNow($id,$tanggal){
        $param['travel']=  Travel::model()->findByPk($id);
        $param['tanggal']=$tanggal;
        $this->renderModal("order_now",$param);
    }
}

?>
