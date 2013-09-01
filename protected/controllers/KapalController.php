<?php
class KapalController extends MyController
{
    public function ActionLihatTarif($id){
        $param['tarifList']=  TarifKapal::model()->getTarifByPemberangkatanKapal($id);
        $this->renderModal('lihat_tarif', $param);
    }
}
?>
