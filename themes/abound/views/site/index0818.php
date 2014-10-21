<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<div class="page-header">
	<h1>Welcome!</h1>
</div>
<!--div class="alert alert-info"-->
  <!--button type="button" class="close" data-dismiss="alert">×</button-->
  <h4 style="margin-left:60px;"><strong>DOST Unified Laboratory Information Management System</strong></h4>
  <p style="margin-left:60px;">A web-based Information Systems</p>
  
<!--/div-->

<div class="row-fluid">
 
  <div class="span12">
  <div class="orbit-container" style="float:left;"><a class="orbit-prev" href="#" title="Previous"><span></span></a></div><div class="orbit-container" style="float:right;"><a class="orbit-next" href="#" title="Next"><span></span></a></div>	
  <?php $filename='dost9-header.png';?>
  <?php echo CHtml::image(Yii::app()->baseUrl.'/images/'.strtolower($filename),'header-image',array('class'=>'header-image'));?>
 <?php
 
	/*$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Employee Salary",
	));
		
?>
<!--p>List of Employees Basic Salary</p-->
<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-salary-grid',
	'htmlOptions'=>array('class'=>'grid-view padding0'),
	'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',	
	'dataProvider'=>$modelSalary->search(),
	'filter'=>$modelSalary,
	'columns'=>array(
		//'id',
		array(
			'name'=>'employeeId',
			'type'=>'raw',
			'value'=>'Employee::model()->findByPk($data->employeeId)->fullName',
			),
		'salary',
		'salaryGrade',
		'step',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>   
<?php $this->endWidget();*/?>
  </div>
  
  <!--div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Sample",
		));
		
	?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			//'List of Benefits'=>$this->renderPartial('_benefits',array('modelBenefit'=>$modelBenefit),true),
			//'List of Deductions'=>$this->renderPartial('_deductions',array('modelDeduction'=>$modelDeduction),true),
			//'panel 3'=>$sample_text,
			//'panel 4'=>$sample_text,
			// panel 5 contains the content rendered by a partial view
			//'panel 5'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
	));
	?>
    <?php $this->endWidget();?>
  </div-->
  
</div>