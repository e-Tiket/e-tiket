<?php

class UserController extends MyController {

    public function actionLogin() {
        $param = array('type' => 'login');
        $param['returnUrl'] = Helper::getQuery('returnUrl');
        if ($_POST) {
            $custommer = new Custommer;
            $custommer->attributes = $_POST['login'];
            $act = Custommer::model()->login($custommer);
            if($act){
                $custommer=  Custommer::model()->findByAttributes(array(), "username='$custommer->username'");
            }
            $this->notice2($act, "Selamat datang " . $custommer->nama_depan . ' ' . $custommer->nama_belakang . '', "Maaf proses login gagal dilakukan");
            if ($act) {
                if (Helper::getQuery('returnUrl') != '') {
                    $this->redirect(Helper::getQuery('returnUrl'));
                } else {
                    $this->redirect(Yii::app()->createUrl(''));
                }
            }
        }
        $this->renderModal('login', $param);
    }

    public function actionDaftar() {
        if ($_POST) {
            $this->show_array($_POST);
            $custommer = new Custommer;
            $custommer->attributes = $_POST['daftar'];
            $custommerToSave = clone $custommer;
            $custommerToSave->password = md5($custommerToSave->password);
            $act = $custommerToSave->save();
            $this->notice2($act, "Selamat datang " . $custommer->nama_depan . ' ' . $custommer->nama_belakang . ' anda sudah menjadi member kami', "Maaf proses registrasi gagal dilakukan");
            if ($act) {
                if (Helper::getQuery('returnUrl') != '') {
                    Custommer::model()->login($custommer);
                    $this->redirect(Helper::getQuery('returnUrl'));
                } else {
                    $this->redirect(Yii::app()->createUrl(''));
                }
            }
        }
        $param = array('type' => 'daftar');
        $param['returnUrl'] = Helper::getQuery('returnUrl');
        $this->renderModal('login', $param);
    }
    public function actionLogout()
    {
            $this->clearOrder();
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
    }
}

?>
