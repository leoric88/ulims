<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Fire Victims</h3>
<div class="row-fluid">
	<div class="span7">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			//'dataProvider'=>$gridDataProviderBarangay,
			'dataProvider'=>$gridDataProvider,
			//'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#','value'=>'$row+1'),
				//array('name'=>'site', 'header'=>'Barangay'),
				//array('name'=>'individual', 'header'=>'Individuals'),
				//array('name'=>'families', 'header'=>'Families'),
				array('name'=>'Name of Head',
					'value'=>'$data->head->nameOfHead',
					//'value'=>'$data->nameOfHead',
					  
					'footer'=>'TOTAL'
				),
				array(
					'header' =>'Household Code',
					'name'=>'householdCode',
					//'footer'=>$provider->itemCount===0 ? '' : 
					//		$this->getTotal($barangays->totalCount(),'householdPerBarangay')
					),
				array(
					'header' =>'Barangay',
					'name'=>'barangay_id',
					'value'=>'$data->barangay->name',  
					//'footer'=>$provider->itemCount===0 ? '' : 
					//		$this->getTotal($barangays->totalCount(),'evacueePerBarangay')
					),
			),
		));?>
	</div><!--/span-->
</div><!--/row-->