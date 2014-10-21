<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderGender,
			'template'=>"{items}",
		 	
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'gender', 'header'=>'Gender'),
				array('name'=>'individuals', 'header'=>'Individuals')
			),
		)); ?>
	</div><!--/span-->
</div><!--/row-->
<?php 
	/*$total = 0;
	foreach($households as $household){
		//echo $household->householdCode.' -- '.$household->noOfFamilyMembers.'<br/>';
		$total += $household->noOfFamilyMembers;
	}
	echo $total;*/
?>