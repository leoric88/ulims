<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Household Status</h3>
<h5>
<?php //echo Yii::app()->request->url;?>
<?php //print_r($columnTotal);?>
<?php //echo CHtml::link('By Barangay', Yii::app()->createUrl('site/status', array('id'=>1)));?><?php //echo CHtml::link('By Evacuation Site', array('site/status/', array('id'=>2)))?>
<?php echo CHtml::link('By Barangay', array('site/status/1'))?> | <?php echo CHtml::link('By Evacuation Site', array('site/status/2'))?>
</h5>
<div class="row-fluid">
	<div class="span12">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}",
		 	
			'columns'=>array(
		 		array('name'=>'0', 'header'=>'#',
					  'htmlOptions' => array(
					        'style' => 'width: 20px;',
					  ),		 		
		 		),
		 		array('name'=>'1', 'header'=>($id == 1) ? 'Barangay' : 'Evacuation Center',
					  //'footer'=>'TOTAL',
		 			  'htmlOptions' => array(
					        'style' => 'width: 150px;',
					  )	 			
		 			  
		 		),
				array('name'=>'2', 'header'=>'In Evacuation Site',
					  //'footer'=>Yii::app()->format->formatNumber($columnTotal[1]),
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  )
    			),
				array('name'=>'3', 'header'=>'Returned Home',
					  //'footer'=>Yii::app()->format->formatNumber($columnTotal[2]),
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'4', 'header'=>'Permanent Location',
					  //'footer'=>Yii::app()->format->formatNumber($columnTotal[3]),
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'5', 'header'=>'Duplicate Household',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'6', 'header'=>'Not an IDP',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'7', 'header'=>'Cannot be found',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'8', 'header'=>'Balik Provincia',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'9', 'header'=>'Temporary Shelter',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'10', 'header'=>'Outside Evacuation Site',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'11', 'header'=>'For Validation',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
				array('name'=>'12', 'header'=>'Total',
					  'htmlOptions' => array(
					        'style' => 'width: 60px; text-align: center;',
					  ),				
				),
			),
		)); ?>
	</div><!--/span-->
</div><!--/row-->
