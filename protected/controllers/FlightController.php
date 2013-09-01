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
class FlightController extends MyController{
    public function actionOrderNow(){
        if($_POST){
            $flightOrder=  json_decode(Yii::app()->session['flightOrder']['param'],true);
            $default=$flightOrder['go']['price_adult'];
            $total  =$flightOrder['go']['price_adult']*$flightOrder['search_param']['dewasa'];
            $total +=($flightOrder['go']['price_child']>0?$flightOrder['go']['price_child']:$default)*$flightOrder['search_param']['anak'];
            $total +=($flightOrder['go']['price_child']>0?$flightOrder['go']['price_infant']:$default)*$flightOrder['search_param']['bayi'];
            if(is_array($flightOrder['ret'])){
                $default=$flightOrder['go']['price_adult'];
                $total +=$flightOrder['ret']['price_adult']*$flightOrder['search_param']['dewasa'];
                $total +=($flightOrder['ret']['price_child']>0?$flightOrder['ret']['price_child']:$default)*$flightOrder['search_param']['anak'];
                $total +=($flightOrder['ret']['price_child']>0?$flightOrder['ret']['price_infant']:$default)*$flightOrder['search_param']['bayi'];
            }
//            $this->show_array($flightOrder);exit;
            $order=new Order();
            $order->id_custommer=  Helper::getUserLogin()->getUserId();
            $order->total_tagihan=$total;
            $order->save();
            
            $flightInfo=$flightOrder['go']['flight_infos']['flight_info'][0];
            $flightOrder['go']=  array_merge($flightInfo, $flightOrder['go']['flight_infos']['flight_info'][0]);
            unset($flightOrder['go']['flight_infos']);
            $flight=new FlightOrder();
            $flight->attributes=$flightOrder['go'];
            $flight->save();
            if(is_array($flightOrder['ret'])){
                $flightInfo=$flightOrder['ret']['flight_infos']['flight_info'][0];
                $flightOrder['ret']=  array_merge($flightInfo, $flightOrder['ret']['flight_infos']['flight_info'][0]);
                unset($flightOrder['ret']['flight_infos']);
                $flight=new FlightOrder();
                $flight->attributes=$flightOrder['ret'];
                $flight->save();
            }
        }
    }
}

?>
