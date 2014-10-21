<?php

class ConfigController extends Controller
{

	public $layout='//layouts/column2';
	
	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
		return array('rights');
	}
	/*
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lab');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAdmin()
	{
		$activeLabDataProvider = new CActiveDataProvider('Lab');
		
		$criteria = new CDbCriteria;
		
		$criteria->with = array('manager');	
		$criteria->compare('status',1);		
				
		$labManagerDataProvider = new CActiveDataProvider('Lab', 
			array('criteria'=>$criteria, 'pagination'=>false
	    ));
	    
	    $criteriaDiscount = new CDbCriteria;
	    $discountsDataProvider = new CActiveDataProvider('Discount', 
			array('criteria'=>$criteriaDiscount, 'pagination'=>false
	    ));
	    
		$rstlId = Yii::app()->Controller->getRstlId();
		
		$rstl = Rstl::model()->findByPk($rstlId);
		$this->render('admin',array(
			//'model'=>$lab,
			'activeLabDataProvider'=>$activeLabDataProvider,
			'labManagerDataProvider'=>$labManagerDataProvider,
			'discountsDataProvider'=>$discountsDataProvider,
			'rstl'=>$rstl
		));
	}
	
	public function actionActivateLab($id){
		Lab::model()->updateByPk($id, 
			array('status'=>1, 
			));
	}
	
	public function actionDeactivateLab($id){
		Lab::model()->updateByPk($id, 
			array('status'=>0, 
			));
	}
}