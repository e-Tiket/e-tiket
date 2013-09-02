<?php

class SiteController extends MyController
{
        public function __construct($id, $module = null) {
            parent::__construct($id, $module);
            $this->title="Home";
        }

        /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
        public function actionFlightOrder(){
            //jika sebelumnya sudah pernah mengisi,/tersimpan di session dan tidak ada input baru
            if(!$_POST && Yii::app()->session['flightOrder']){
                $_POST=Yii::app()->session['flightOrder'];
            }
            
            if($_POST){
                Yii::app()->session['flightOrder']=$_POST;
                $_POST=  json_decode($_POST['param'],true);
            }
            if(!$_POST){
                $this->noticeInfo("Tiket pesawat belum dipilih");
                $this->redirect(Yii::app()->createUrl('site/index#tab1'));
            }
            $this->show_array($_POST);
            $this->renderModal('flight_order',array('data'=>$_POST));
        }
        
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $param=array(
                    'to'=>'','from'=>'',
                    'search_type'=>isset($_GET['search_type'])?$_GET['search_type']:'',
                    'tanggal_berangkat'=>'','tanggal_pulang'=>'',
                );
                
                switch ($param['search_type']){
                    case "flight": 
                            $url="http://api.master18.tiket.com/search/flight?d=$_GET[from]&a=$_GET[to]&date=".($_GET['tanggal_berangkat'])."&ret_date=".($_GET['tanggal_pulang'])."&adult=$_GET[dewasa]&child=$_GET[anak]&infant=$_GET[bayi]&v=4";
//                            echo $url;exit;
                            $param['flight']            =$this->requestAPI($url);
                            $this->show_array($param['flight']);exit;
                            $param['to']                =$_GET['to'];
                            $param['from']              =$_GET['from'];
                            $param['tanggal_berangkat'] =$_GET['tanggal_berangkat'];
                            $param['tanggal_pulang']    =$_GET['tanggal_pulang'];
                        break; //end flight
                    case 'kapal':
                        $param['kapal']=  Kapal::model()->getJadwal(Helper::getQuery('id_pelabuhan_awal'), 
                                Helper::getQuery('id_pelabuhan_tujuan'), Helper::getQuery('tanggal'), Helper::getQuery('tanggal_sebelum'));
                        break;
                    case 'travel':
                        $param['travel']=  Travel::model()->getJadwal(Helper::getQuery('id_pelabuhan_awal'), 
                                Helper::getQuery('id_pelabuhan_tujuan'), Helper::getQuery('tanggal'), Helper::getQuery('tanggal_sebelum'));
                        break;
                        break;
                }
//                $destination=$this->requestAPI("https://api.master18.tiket.com/flight_api/all_airport?1=1");
//                $param['airport']=$destination['all_airport']['airport'];
                $param['airport']=array();
                
                $param['travel']= Travel::model()->findAll();
		$this->render('index',$param);

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
        
}