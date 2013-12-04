<?php

class TravelSeatController extends MyAdminController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $model=new TravelSeat('search');
		$model->unsetAttributes();  // clear any default values
                if($_GET['ajax'])
                    $this->renderModal('view',array(
                            'viewModel'=>$this->loadModel($id),'model'=>$model,
                    ));
                else
                    $this->render('view',array(
                            'viewModel'=>$this->loadModel($id),'model'=>$model,
                    ));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TravelSeat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TravelSeat']))
		{
			$model->attributes=$_POST['TravelSeat'];
                        $is_success=$model->save();
                        $model->gambar=CUploadedFile::getInstance($model,'gambar');
                        if($is_success && $model->gambar!=null)
                        {
                            $is_success=$model->gambar->saveAs("upload/travel/".$model->id.'_'.$model->gambar->name);
                            $model->gambar="upload/travel/".$model->id.'_'.$model->gambar->name;
                            $model->save();
                        }
                        
                        $this->notice($is_success,'Travel Seat','create');
			if($is_success){
				$this->redirect(array('view','id'=>$model->id));
                        }else{
                            $this->render('create',array(
                                    'model'=>$model
                            ));
                        }
		}else{
                    if($_GET['ajax'])
                        $this->renderModal('create',array(
                                'model'=>$model,
                        ));
                    else
                        $this->render('create',array(
                                'model'=>$model,
                        ));
                }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TravelSeat']))
		{
                                                $gambar=$model->gambar;
			$model->attributes=$_POST['TravelSeat'];
                        $is_success=$model->save();
                        
                        $this->notice($is_success,'Travel Seat','update');
			if($is_success){
                                $model->gambar=CUploadedFile::getInstance($model,'gambar');
                                if($model->gambar!=null)
                                {
                                    if(file_exists($gambar)){
                                        unlink($gambar);
                                    }
                                    $is_success=$model->gambar->saveAs("upload/travel/".$model->id.'_'.$model->gambar->name);
                                    $model->gambar="upload/travel/".$model->id.'_'.$model->gambar->name;
                                    $model->save();
                                }
				$this->redirect(array('view','id'=>$model->id));
                        }
		}
                if($_GET['ajax'])
                    $this->renderModal('update',array(
                            'model'=>$model,
                    ));
                else{
                    $this->render('update',array(
                                    'model'=>$model
                            ));
                }
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                $is_success=$this->loadModel($id)->delete();
                $this->notice($is_success,'Travel Seat','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->createUrl('pageadmin/travelSeat'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('TravelSeat');
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//));
                $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TravelSeat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TravelSeat']))
			$model->attributes=$_GET['TravelSeat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TravelSeat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='travel-seat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
