<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">DOST - Unified Laboratory Information Management System</a>
          
          <?php 
			/*$roles = Rights::getAssignedRoles(Yii::app()->user->Id);
			foreach($roles as $role){
				//echo $role->name;
			}*/
          
        	$menu = array();
          	
          	
          ?>
          
          <?php 
				if(Yii::app()->user->isSuperuser){
					$menu = array(
	                        array('label'=>'Users', 'url'=>array('/user/admin')),
	                        array('label'=>'Rights', 'url'=>array('/rights')),
	                        array('label'=>'Gii', 'url'=>array('/gii/default/login')),
	                        );
				}else{
					
					if(isset(Yii::app()->user->access)){
						$accesslist = explode(',', Yii::app()->user->access);
						for($i=0; $i<count($accesslist); $i++)
						{
							$access = Accesslist::model()->findByPk($accesslist[$i]);
							array_push($menu, array('label'=>$access->label, 'url'=>array($access->url)));
						}
		          	}
					/*$menu = array(
		                        //array('label'=>'Dashboard', 'url'=>array('/site/barangay')),
		                        array('label'=>'LMS', 'url'=>array('/lms/request/admin')),
		                        array('label'=>'PMIS', 'url'=>array('/pmis/project/admin')),
		                        //array('label'=>'Manage Assets <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
		                        //'items'=>array(
									//array('label'=>'Incident <span class="badge badge-info pull-right">'.Incident::model()->count().'</span>', 'url'=>array('incident/admin')),
									//array('label'=>'Assistance Type <span class="badge badge-info pull-right">'.Assistancetype::model()->count().'</span>', 'url'=>array('assistancetype/admin')),
									//array('label'=>'Disability <span class="badge badge-info pull-right">'.Disability::model()->count().'</span>', 'url'=>array('disability/admin')),
									//array('label'=>'Education <span class="badge badge-info pull-right">'.Education::model()->count().'</span>', 'url'=>array('education/admin')),
									//array('label'=>'Evacuation Centers <span class="badge badge-info pull-right">'.Evacuation::model()->count().'</span>', 'url'=>array('evacuation/admin')),
									//array('label'=>'Ethnicity <span class="badge badge-info pull-right">'.Ethnicity::model()->count().'</span>', 'url'=>array('ethnicity/admin')),
									//array('label'=>'Household Status <span class="badge badge-info pull-right">'.Householdstatus::model()->count().'</span>', 'url'=>array('householdstatus/admin')),
									//array('label'=>'Occupational Skills <span class="badge badge-info pull-right">'.Occupationalskill::model()->count().'</span>', 'url'=>array('occupationalskill/admin')),
									//array('label'=>'Member Status <span class="badge badge-info pull-right">'.Memberstatus::model()->count().'</span>', 'url'=>array('memberstatus/admin')),
									//array('label'=>'Relation to Head <span class="badge badge-info pull-right">'.Relationtohead::model()->count().'</span>', 'url'=>array('relationtohead/admin')),
									//array('label'=>'Socialworker <span class="badge badge-info pull-right">'.Socialworker::model()->count().'</span>', 'url'=>array('socialworker/admin')),
									//array('label'=>'Source of Income <span class="badge badge-info pull-right">'.Sourceofincome::model()->count().'</span>', 'url'=>array('sourceofincome/admin')),
		                        //)),
		                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		                        );*/
				}
				
				array_push($menu, array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest));
				array_push($menu, array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest));
				array_push($menu, array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest));
          ?>
          
          <div class="nav-collapse">
          <?php //if($role->name == 'Administrator' || $role->name == 'Admin'){?>
          
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>$menu,
                )); ?>
    		
    		<?php //}elseif($role->name == 'Data Encoder'){?>
          
          <?php //if($role->name == 'Data Encoder'){?>
         
			<?php /*$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        //array('label'=>'Users', 'url'=>array('/user/admin')),
                        array('label'=>'Dashboard', 'url'=>array('/site/status/1')),
						array('label'=>'Households', 'url'=>array('/household/admin')),
						array('label'=>'Evacuees', 'url'=>array('/evacuee/admin')),
                    ),*/
                //)); ?>
    
    		<?php //}?>
    		
	
				<?php /*$this->widget('zii.widgets.CMenu',array(
	                    'htmlOptions'=>array('class'=>'pull-right nav'),
	                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
						'itemCssClass'=>'item-test',
	                    'encodeLabel'=>false,
	                    'items'=>array(
	                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
	                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
	                    ),
	                ));*/ ?>
	    </div>
    </div>
	</div>
</div>


