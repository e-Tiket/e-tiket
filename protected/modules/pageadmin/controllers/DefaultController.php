<?php

class DefaultController extends MyAdminController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}