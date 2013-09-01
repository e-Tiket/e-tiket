<?php
class TesController extends MyController{
    function actionIndex(){
        echo Yii::app()->user->getId();
        
        $this->show_array(Yii::app()->user);
        $this->show_array(Yii::app()->session);
    }
}
?>
