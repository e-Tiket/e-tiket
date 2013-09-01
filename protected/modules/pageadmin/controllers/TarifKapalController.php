<?php

class TarifKapalController extends MyAdminController
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
                $model=new TarifKapal('search');
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
	public function actionCreate($id_pemberangkatan)
	{
		$model=new TarifKapal;
                $model->id_pemberangkatan=$id_pemberangkatan;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TarifKapal']))
		{
			$model->attributes=$_POST['TarifKapal'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Tarif Kapal','create');
			if($is_success){
				$this->redirect(array('admin','id_pemberangkatan'=>$model->id_pemberangkatan));
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

		if(isset($_POST['TarifKapal']))
		{
			$model->attributes=$_POST['TarifKapal'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Tarif Kapal','update');
			if($is_success)
				$this->redirect(array('admin','id_pemberangkatan'=>$model->id_pemberangkatan));
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
                $this->notice($is_success,'Tarif Kapal','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->createUrl('pageadmin/tarifKapal'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('TarifKapal');
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//));
                $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id_pemberangkatan)
	{
		$pemberangkatanModel=  PemberangkatanKapal::model()->findByPk($id_pemberangkatan);
                $model=new TarifKapal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TarifKapal']))
			$model->attributes=$_GET['TarifKapal'];

		$this->render('admin',array(
			'model'=>$model,'id_pemberangkatan'=>$id_pemberangkatan,'pemberangkatanModel'=>$pemberangkatanModel
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TarifKapal::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tarif-kapal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
