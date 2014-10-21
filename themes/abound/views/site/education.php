<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl;
//print_r($educationPie); 
//$key = array_search(max($educationPie), $educationPie);
//echo "<br/>".$key
?>

<div class="row-fluid">
	<div class="span6">
		 <?php $this->widget('zii.widgets.grid.CGridView', array(
			//'type'=>'striped bordered condensed',
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderEducation,
			'template'=>"{items}",
		 	
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'education', 'header'=>'Educational Attainment'),
				array('name'=>'individuals', 'header'=>'Individuals')
			),
		)); ?>
	</div><!--/span-->
	
	<div class="span7">
    <?php 
    /** Pie Chart **/
    $this->widget('ext.highcharts.HighchartsWidget',
    array('options'=>array(
        'chart'=>array(
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> true,
        ),
        'title'=>array(
            'text'=> 'Distribution of Evacuees Based on Educational Attainment'
        ),
        'tooltip'=>array(
             'formatter'=> 'js:function(){ return "<b>"+this.point.name+"</b>: "+this.percentage+"%"}'
        ),
        'plotOptions'=>array(
            'pie'=> array(
                'allowPointSelect'=>true,
                'cursor'=>'pointer',
                'dataLabels'=>array('enabled'=>true),
                'showInLegend'=>true
            )
        ),
        'exporting'=> array(
        	'buttons'=> array(
        		'contextButtons'=> array(
        				'enabled'=> true,
        				'menuItems'=> null
        		),
        		'enabled'=> true	
        	)
        ),
        'series'=>array(
                array(
                    'type'=> 'pie',
                    'name'=>'Browser share',
                    'data' => $educationPie/*array(
                		
                        array('name'=> 'Firefox','y'=>45.0),
                        array('name'=> 'IE','y'=>26.8),
                        array(
                            'name'=>'Chrome',
                            'y'=>12.8,
                            'sliced'=>true,
                            'selected'=>true
                            ),
                        array('name'=> 'Safari','y'=>8.5),
                        array('name'=> 'Opera','y'=>6.2),
                        array('name'=> 'Others','y'=>0.7)
                        
                    )*/
                ),
            )
        )));
    ?>
    </div><!--/span-->
</div><!--/row-->