<?php
/* @var $this ConfigController */

$this->breadcrumbs=array(
	'Config',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php 
$linkUpdate = Chtml::link('Update', '', array( 
			'style'=>'cursor:pointer;',
			'onClick'=>'js:{updateLab(); $("#dialogUpdateLab").dialog("open");}',
			'class'=>'btn btn-info btn-small'
			));
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"<b>Laboratories</b> ",//.$linkUpdate,
	));	
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'lab-grid',
        'summaryText'=>false,
		'htmlOptions'=>array('class'=>'grid-view padding0'),
        'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
        //'rowHtmlOptionsExpression' => 'array("title" => "Click to view details", "class"=>"link-hand")',
        'dataProvider'=>$activeLabDataProvider,
        'columns'=>array(
            //'id',
            //array('class'=>'CCheckBoxColumn'),
            'labName',
            'labCode',
           	array(
			//'class'=>'CButtonColumn',
			'header'=>'Status',
			'class'=>'bootstrap.widgets.TbButtonColumn',
						//'deleteConfirmation'=>"js:'Do you really want to delete sample: '+$.trim($(this).parent().parent().children(':nth-child(2)').text())+'?'",
						'template'=>'{active} {not active}',
						'buttons'=>array
						(
							'active' => array(
								'visible'=>'$data->status',
								'url'=>'Yii::app()->createUrl("/config/deactivateLab/id/$data->id")',
								'options' => array(
									'confirm'=>'Do you want to set this Lab as Not Active?',
									'ajax' => array(
										'type' => 'get',
										'url'=>'js:$(this).attr("href")', 
										'success' => 'js:function(data) { $.fn.yiiGridView.update("lab-grid")}')
									),
								),
							'not active' => array(
								'visible'=>'!$data->status',
								'url'=>'Yii::app()->createUrl("/config/activateLab/id/$data->id")',
								'options' => array(
									'confirm'=>'Do you want to set this Lab as Active?',
									'ajax' => array(
										'type' => 'get', 
										'url'=>'js:$(this).attr("href")', 
										'success' => 'js:function(data) { $.fn.yiiGridView.update("lab-grid")}')
									),
								),
						),
			)
            ),
)); ?>

<?php $this->endWidget(); //End Portlet ?>    

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"<b>Technical Managers</b> ",
	));	
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'labmanager-grid',
        'summaryText'=>false,
		'htmlOptions'=>array('class'=>'grid-view padding0'),
        'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
        //'rowHtmlOptionsExpression' => 'array("title" => "Click to view details", "class"=>"link-hand")',
        'dataProvider'=>$labManagerDataProvider,
        'columns'=>array(
            //'id',
            'labName',
            array(
            	'name'=>'Manager', 
				'value'=>'$data->manager->user->profile->firstname." ".$data->manager->user->profile->lastname',
				'htmlOptions' => array('style' => 'width: 300px; text-align: left; ')
            ),
            /*array(
            	'name'=>'manager_id',
            	'header'=>'Manager ID',
            	'value'=>'$data->manager->id'
            )*/
            ),
)); ?>
<?php $this->endWidget(); //End Portlet ?>   

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"<b>Discounts</b> ",
	));	
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'discounts-grid',
        'summaryText'=>false,
		'htmlOptions'=>array('class'=>'grid-view padding0'),
        'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
        //'rowHtmlOptionsExpression' => 'array("title" => "Click to view details", "class"=>"link-hand")',
        'dataProvider'=>$discountsDataProvider,
        'columns'=>array(
            //'id',
            //array('class'=>'CCheckBoxColumn'),
            'type',
			array(
            	'name'=>'rate',
				'value'=>'$data->rate." %"',
				'htmlOptions' => array('style' => 'width: 300px; text-align: center; ')
			),
			array(
            	'name'=>'status',
				'value'=>'$data->status ? "Active" : "Not Active"',
				'htmlOptions' => array('style' => 'width: 300px; text-align: center; ')
			)
           	/*array(
			//'class'=>'CButtonColumn',
			'header'=>'Status',
			'class'=>'bootstrap.widgets.TbButtonColumn',
						//'deleteConfirmation'=>"js:'Do you really want to delete sample: '+$.trim($(this).parent().parent().children(':nth-child(2)').text())+'?'",
						'template'=>'{active} {not active}',
						'buttons'=>array
						(
							'active' => array(
								'visible'=>'$data->status',
								'url'=>'Yii::app()->createUrl("/config/deactivateLab/id/$data->id")',
								'options' => array(
									'confirm'=>'Do you want to set this Lab as Not Active?',
									'ajax' => array(
										'type' => 'get',
										'url'=>'js:$(this).attr("href")', 
										'success' => 'js:function(data) { $.fn.yiiGridView.update("lab-grid")}')
									),
								),
							'not active' => array(
								'visible'=>'!$data->status',
								'url'=>'Yii::app()->createUrl("/config/activateLab/id/$data->id")',
								'options' => array(
									'confirm'=>'Do you want to set this Lab as Active?',
									'ajax' => array(
										'type' => 'get', 
										'url'=>'js:$(this).attr("href")', 
										'success' => 'js:function(data) { $.fn.yiiGridView.update("lab-grid")}')
									),
								),
						),
			)*/
            ),
)); ?>
<?php $this->endWidget(); //End Portlet ?> 

<!-- Laboratory Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogUpdateLab',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Update Laboratories',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>400,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Laboratory Dialog : End -->

<!-- Laboratory Manager Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogUpdateLabManager',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Update Laboratories',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>330,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Laboratory Manager Dialog : End -->

<!-- Discount Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogUpdateDiscount',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Update Discount',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>330,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Discount Dialog : End -->
<?php 
$image = CHtml::image(Yii::app()->request->baseUrl . '/images/ajax-loader.gif');
Yii::app()->clientScript->registerScript('labmanagersgrid', "
$('#labmanager-grid table tbody tr').live('click',function()
{
	    var id = $.fn.yiiGridView.getKey(
        'labmanager-grid',
        $(this).prevAll().length 
    	);
    	
    	//var id = $(this).children(':nth-child(3)').text();
		if($(this).children(':nth-child(1)').text()=='No results found.'){
			alert($(this).children(':nth-child(1)').text());
		}else{
			updateLabManager(id);
			$('#dialogUpdateLabManager').dialog('open');
		}
});
");

Yii::app()->clientScript->registerScript('discountsgrid', "
$('#discounts-grid table tbody tr').live('click',function()
{
	    var id = $.fn.yiiGridView.getKey(
        'discounts-grid',
        $(this).prevAll().length 
    	);
    	
		if($(this).children(':nth-child(1)').text()=='No results found.'){
			alert($(this).children(':nth-child(1)').text());
		}else{
			updateDiscount(id);
			$('#dialogUpdateDiscount').dialog('open');
		}
});
");
?>

<script type="text/javascript">
function updateLab()
{
    <?php echo CHtml::ajax(array(
			'url'=>$this->createUrl('lab/configlab/update',array('id'=>$rstl->labConfig->id)),
			'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogUpdateLab').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogUpdateLab form').submit(updateLab);
                }
                else
                {
                    $.fn.yiiGridView.update('lab-grid');
					$('#dialogUpdateLab').html(data.div);
                    setTimeout(\"$('#dialogUpdateLab').dialog('close') \",1000);
					
                }
 
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogUpdateLab").html(
						\'<div class="loader">'.$image.'<br\><br\>Generating form.<br\> Please wait...</div>\'
					);
             }',
			 'error'=>"function(request, status, error){
				 	$('#dialogUpdateLab').html(status+'('+error+')'+': '+ request.responseText );
					}",
			
            ))?>;
    return false; 
 
}

function updateLabManager(id)
{
	<?php 
	echo CHtml::ajax(array(
			'url'=>$this->createUrl('lab/labmanager/update'),
			'data'=> "js:$(this).serialize()+ '&id='+id",
			//'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogUpdateLabManager').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogUpdateLabManager form').submit(updateLabManager);
                }
                else
                {
                    $.fn.yiiGridView.update('labmanager-grid');
					$('#dialogUpdateLabManager').html(data.div);
                    setTimeout(\"$('#dialogUpdateLabManager').dialog('close') \",1000);
                }
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogUpdateLabManager").html(
						\'<div class="loader">'.$image.'<br\><br\>Retrieving record.<br\> Please wait...</div>\'
					);
            }',
			 'error'=>"function(request, status, error){
				 	$('#dialogUpdateLabManager').html(status+'('+error+')'+': '+ request.responseText+ ' {'+error.code+'}' );
					}",
            ))?>;
    return false; 
 
}

function updateDiscount(id)
{
	<?php 
	echo CHtml::ajax(array(
			'url'=>$this->createUrl('lab/discount/update'),
			'data'=> "js:$(this).serialize()+ '&id='+id",
			//'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogUpdateDiscount').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogUpdateDiscount form').submit(updateDiscount);
                }
                else
                {
                    $.fn.yiiGridView.update('discounts-grid');
					$('#dialogUpdateDiscount').html(data.div);
                    setTimeout(\"$('#dialogUpdateDiscount').dialog('close') \",1000);
                }
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogUpdateDiscount").html(
						\'<div class="loader">'.$image.'<br\><br\>Retrieving record.<br\> Please wait...</div>\'
					);
            }',
			 'error'=>"function(request, status, error){
				 	$('#dialogUpdateDiscount').html(status+'('+error+')'+': '+ request.responseText+ ' {'+error.code+'}' );
					}",
            ))?>;
    return false; 
 
}
</script>