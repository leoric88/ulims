<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
			'dataProvider'=>$gridDataProviderGender,
			'template'=>"{items}",
		 	
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'gender', 'header'=>'Gender'),
				array('name'=>'individuals', 'header'=>'Individuals')
			)
		)); ?>
	</div><!--/span-->
</div><!--/row-->
