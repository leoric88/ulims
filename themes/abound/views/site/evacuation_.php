<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Distribution of Evacuees by Evacuation Center</h3>
<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			//'dataProvider'=>$gridDataProviderBarangay,
			'dataProvider'=>$evacuation->totalCount(),
			//'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				//array('name'=>'site', 'header'=>'Barangay'),
				//array('name'=>'individual', 'header'=>'Individuals'),
				//array('name'=>'families', 'header'=>'Families'),
				array('name'=>'site','footer'=>'TOTAL'),
				array(
					'header' =>'Families',
					'name'=>'householdPerEvac',
					'footer'=>$provider->itemCount===0 ? '' : 
							$this->getTotal($evacuation->totalCount(),'householdPerEvac')
					),
				array(
					'header' =>'Individuals',
					'name'=>'evacueePerEvac',
					'footer'=>$provider->itemCount===0 ? '' : 
							$this->getTotal($evacuation->totalCount(),'evacueePerEvac')
					),
			),
		));?>
	</div><!--/span-->
</div><!--/row-->
