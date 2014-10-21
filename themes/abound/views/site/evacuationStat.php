<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Distribution of Evacuees by Evacuation Center</h3>
<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderEvacuation,
			'template'=>"{items}",
		 	
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'site', 'header'=>'Evacuation Center'),
				array('name'=>'individuals', 'header'=>'Individuals'),
				array('name'=>'families', 'header'=>'Families'),
			),
		)); ?>
	</div><!--/span-->
</div><!--/row-->
