<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Distribution of Evacuees by Barangay</h3>
<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderBarangay,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'site', 'header'=>'Barangay'),
				array('name'=>'individuals', 'header'=>'Individuals'),
				array('name'=>'families', 'header'=>'Households'),
			),
		)); ?>
	</div><!--/span-->
</div><!--/row-->
