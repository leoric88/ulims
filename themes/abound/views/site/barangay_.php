<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Distribution of Evacuees by Barangay</h3>
<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			//'dataProvider'=>$gridDataProviderBarangay,
			'dataProvider'=>$barangays->totalCount(),
			//'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#','value'=>'$row+1'),
				//array('name'=>'site', 'header'=>'Barangay'),
				//array('name'=>'individual', 'header'=>'Individuals'),
				//array('name'=>'families', 'header'=>'Families'),
				array('name'=>'name','footer'=>'TOTAL'),
				array(
					'header' =>'Families',
					'name'=>'householdPerBarangay',
					'footer'=>$provider->itemCount===0 ? '' : 
							$this->getTotal($barangays->totalCount(),'householdPerBarangay')
					),
				array(
					'header' =>'Individuals',
					'name'=>'evacueePerBarangay',
					'footer'=>$provider->itemCount===0 ? '' : 
							$this->getTotal($barangays->totalCount(),'evacueePerBarangay')
					),
			),
		));?>
	</div><!--/span-->
</div><!--/row-->
