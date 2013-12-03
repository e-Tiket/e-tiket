<?php

class DefaultController extends FrontendGalleryController
{
	public function actionIndex()
	{
                $param['photoList']=  GalleryPhoto::model()->findAll();
                $param['galleryList']=  Gallery::model()->findAll();
		$this->render('index',$param);
	}
}