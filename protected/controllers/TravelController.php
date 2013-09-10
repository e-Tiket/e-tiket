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
    public function actionTravelOrder($id,$tanggal){
//        $this->show_array($_POST);exit;
        if($_POST){
            $is_success=false;
            $travel=Travel::model()->findByPk($id);
            $travelOrder=new TravelOrder();
            $travelOrder->attributes=$_POST['order'];
            $travelOrder->id_travel=$id;
            $travelOrder->harga=$travel->harga;
            $travelOrder->jumlah_seat=count($_POST['seat_list']);
            if($travelOrder->save()){
                foreach ($_POST['seat_list'] as $seat_ke){
                    $seat=new SeatPenumpangTravel();
                    $seat->id_travel_order=$travelOrder->id;
                    $seat->seat_ke=$seat_ke;
                    $seat->save();
                }
                $order=new Order();
                if(Helper::getUserLogin()->isLogin() && Helper::getUserLogin()->isCustommer()){
                    $custommer=  Helper::getUserLogin()->getUserProfile();
                    $order->id_custommer=$custommer->id;
                }
                $order->total_tagihan=$travel->harga*$travelOrder->jumlah_seat;
                $order->jenis_order='travel';
                $order->save(false);
                $travelOrder->id_order=$order->id;
                $travelOrder->save();
                $is_success=true;
            }
            $this->notice2($is_success, "Pemesanan travel berhasil dilakukan", "Pemesanan travel gagal dilakukan");
            
            if($is_success){
                if(Helper::getUserLogin()->isLogin() && Helper::getUserLogin()->isCustommer()){
                    $this->redirect(Yii::app()->createUrl('site/orderHistory'));
                }else
                    $this->redirect(Yii::app()->createUrl('site/pembayaran',array('id'=>$order->id)));
            }else{
                $travelOrder->delete();
                $order->delete();
                $this->redirect(Yii::app()->createUrl('site/index'));
            }
            
        }
        $param['travel']    =Travel::model()->findByPk($id);
        $param['tanggal']   =$tanggal;
        $param['listKosong']=  Travel::model()->getSeatListTidakTerpakai($id, $tanggal);
        if(Helper::getUserLogin()->isLogin() && Helper::getUserLogin()->isCustommer()){
            $param['user']=  Helper::getUserLogin()->getUserProfile();
        }else{
            $param['user']=new Custommer();
        }
        
        $this->renderModal("travel_order",$param);
    }
}

?>
