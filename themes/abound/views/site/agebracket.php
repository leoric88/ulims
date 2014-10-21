<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<h3>Age Group</h3>
<h5><?php echo CHtml::link('By Barangay', array('site/agebracket/1'))?> | <?php echo CHtml::link('By Evacuation Site', array('site/agebracket/2'))?></h5>
<div class="row-fluid">
	<div class="span8">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}",
			'columns'=>array(
		 		array('name'=>'a', 'header'=>($id == 1) ? 'Barangay' : 'Evacuation Center'),
				array(
					'name'=>'b', 
					'header'=>'0-2', 
					'value'=>'Yii::app()->format->formatNumber($data["b"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'c', 
					'header'=>'3-5', 
					'value'=>'Yii::app()->format->formatNumber($data["c"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'d', 
					'header'=>'6-12', 
					'value'=>'Yii::app()->format->formatNumber($data["d"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'e', 
					'header'=>'13-16', 
					'value'=>'Yii::app()->format->formatNumber($data["e"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'f', 
					'header'=>'17-59', 
					'value'=>'Yii::app()->format->formatNumber($data["f"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'g', 
					'header'=>'60-ABOVE', 
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
				array(
					'name'=>'h', 
					'header'=>'Total', 
					'value'=>'Yii::app()->format->formatNumber($data["h"])',
					'htmlOptions' => array('style' => 'text-align: center;')	
				),
			)
		));
		?>
	</div><!--/span-->
</div><!--/row-->
<?php //print_r($dataArray);?>
<?php //echo '<br/>';?>
<?php //print_r($model);?>
<?php //foreach($model as $evacuee){echo $evacuee['age'].'<br/>';}?>