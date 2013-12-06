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
//            Helper::show_array($_POST);exit;
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
                $id_order=  $this->getOrderId(true);
                
                $travelOrder->id_order=$id_order;
                $travelOrder->save();
                
                $this->updateTotalTagihanOrder($travel->harga*$travelOrder->jumlah_seat);
                $is_success=true;
            }
            if($is_success){
                if($_POST['action']=='order_now'){
                    $this->notice2($is_success, "Pemesanan travel berhasil dilakukan", "Pemesanan travel gagal dilakukan");
                    if(Helper::getUserLogin()->isLogin() && Helper::getUserLogin()->isCustommer()){
                        $this->redirect(Yii::app()->createUrl('site/orderHistory'));
                        $this->clearOrder();
                    }else{
                        $this->redirect(Yii::app()->createUrl('site/pembayaran',array('id'=>$order->id)));
                    }
                }else{
                    //add to cart
                    $this->notice2($is_success, "Pemesanan travel berhasil ditambahkan ke keranjang", "Pemesanan travel gagal ditambahkan");
                    $this->redirect(Yii::app()->createUrl('site/index'));
                }
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
