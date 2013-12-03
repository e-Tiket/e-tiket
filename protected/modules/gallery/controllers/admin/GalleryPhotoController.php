<?php

class GalleryPhotoController extends AdminGalleryController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('admin','delete','list','updateTes'),
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
                $model=new GalleryPhoto('search');
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
		$model=new GalleryPhoto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryPhoto']))
		{
			$model->attributes=$_POST['GalleryPhoto'];
                        $is_success=$model->save();
                        
                        $model->path_file=CUploadedFile::getInstance($model,'path_file');
                        if($is_success && $model->path_file!=null)
                        {
                            $is_success=$model->path_file->saveAs('./'.$this->getGalleryPath()."/".$model->id.'_'.$model->path_file->name);
                            $model->path_file=$model->id.'_'.$model->path_file->name;
                            $model->save();
                            
                            Yii::import('application.extensions.image.Image');
                            $image = new Image('./'.$this->getGalleryPath().'/'.$model->path_file);
                            $image->resize(400, 100);
                            $image->save('./'.$this->getGalleryThumbPath().'/'.$model->path_file);
                        }
                        
                        $this->notice($is_success,'Gallery Photo','create');
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

		if(isset($_POST['GalleryPhoto']))
		{
			$oldModel=$this->loadModel($id);
                        
                        $model->attributes=$_POST['GalleryPhoto'];
                        $is_success=$model->save();
                        $model->path_file=CUploadedFile::getInstance($model,'path_file');
                        if($is_success && $model->path_file!=null)
                        {
                            Helper::removeFile(''.$this->getGalleryPath()."/".$oldModel->path_file);
                            Helper::removeFile(''.$this->getGalleryThumbPath()."/".$oldModel->path_file);
                            
                            $is_success=$model->path_file->saveAs('./'.$this->getGalleryPath()."/".$model->id.'_'.$model->path_file->name);
                            $model->path_file=$model->id.'_'.$model->path_file->name;
                            $model->save();
                            
                            Yii::import('application.extensions.image.Image');
                            $image = new Image('./'.$this->getGalleryPath().'/'.$model->path_file);
                            $image->resize(400, 100);
                            $image->save('./'.$this->getGalleryThumbPath().'/'.$model->path_file);
                        }
                        $this->notice($is_success,'Gallery Photo','update');
			if($is_success)
				$this->redirect(array('view','id'=>$model->id));
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
                $model=$this->loadModel($id);
                $is_success=$model->delete();
                $this->notice($is_success,'Gallery Photo','delete');
                Helper::removeFile(''.$this->getGalleryPath()."/".$model->path_file);
                Helper::removeFile(''.$this->getGalleryThumbPath()."/".$model->path_file);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                else{
                    echo $is_success?'true':'false';
                }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('GalleryPhoto');
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
		$model=new GalleryPhoto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GalleryPhoto']))
			$model->attributes=$_GET['GalleryPhoto'];
                $dataProvider=new CActiveDataProvider('GalleryPhoto');
		$this->render('admin',array(
			'model'=>$model,'galleryList'=>  Gallery::model()->findAll(),
                    'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GalleryPhoto::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
