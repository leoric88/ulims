	<?php
/* @var $this CollectionController */
/* @var $model Collection */
/* @var $form CActiveForm */
Yii::app()->clientscript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'collection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'id')?>
	<div class="row">
		<?php //echo $form->labelEx($model,'request_id'); ?>
		<?php echo $form->hiddenField($model,'request_id'); ?>
		<?php //echo $form->error($model,'request_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'receipt_id'); ?>
		<?php echo $form->hiddenField($model,'receipt_id'); ?>
		<?php //echo $form->error($model,'receipt_id'); ?>
	</div>
		<div class="row">
		<?php if($receipt->collectionType == 1 || $receipt->collectionType == 2 || $receipt->collectionType == 11):?>
			<?php $this->widget('ext.select2.ESelect2', array(
	            'selector' => '#Collection_nature',
	            //'model'=>$model,
				//'attribute'=>'nature',
	            'options'  => array(
						'width'=>'268px',
	                    'allowClear'=>true,
	                    'placeholder'=>'Search Request Reference here...',
	                    'minimumInputLength' => 4,
	                    'ajax' => array(
	                            'url' => $this->createUrl('collection/searchRequest'),
	                            'dataType' => 'json',
	                            'quietMillis'=> 100,
	                            'data' => 'js: function(text,page) {
	                                            return {
	                                                q: text,
	                                                page_limit: 10,
	                                                page: page,
	                                            };
	                                        }',
	                            'results'=>'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more }; }',
	                    ),
	            ),
	            'events' =>array('change'=>'js:function(e) 
			                    { 
			                       data = $(this).select2("data");
			                       $("#Collection_request_id").val(data.id);
			                       $("#Collection_nature").val(data.text);
			                       $("#Collection_amount").val(data.total);
			                    }
			                    '
			            ),
	          ));?>
		<?php endif;?>
		        
		<?php echo $form->labelEx($model,'nature'); ?>
		<?php echo $form->textField($model,'nature',
					array(
						'value'=>($model->isNewRecord ? $receipt->typeOfCollection->natureOfCollection : $model->nature),
						'size'=>50,
						'maxlength'=>50
					)
				); 
		?>
		<?php echo $form->error($model,'nature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'receiptid'); ?>
		<?php //echo $form->textField($model,'receiptid'); ?>
		<?php //echo $form->error($model,'receiptid'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'cancelled'); ?>
		<?php //echo $form->textField($model,'cancelled'); ?>
		<?php //echo $form->error($model,'cancelled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->