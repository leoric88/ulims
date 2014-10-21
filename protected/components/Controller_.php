<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function getYear()
	{
		$listYear = array();
		for ($year = date('Y'); $year > 1900; $year = $year - 1) {
			$y = array("index" => $year , "year" => $year);
			array_push($listYear, $y);
		}
		return $listYear;	
	}
	
	public function getMonth()
	{
		$listMonth = array( 
						array('index' => 1, 'month' => 'January'),
						array('index' => 2, 'month' => 'February'),
						array('index' => 3, 'month' => 'March'),
						array('index' => 4, 'month' => 'April'),
						array('index' => 5, 'month' => 'May'),
						array('index' => 6, 'month' => 'June'),
						array('index' => 7, 'month' => 'July'),
						array('index' => 8, 'month' => 'August'),
						array('index' => 9, 'month' => 'September'),
						array('index' => 10, 'month' => 'October'),
						array('index' => 11, 'month' => 'November'),
						array('index' => 12, 'month' => 'December'),
					);
		return $listMonth;	
	}
	
	public function getDay()
	{
		$listDay = array();
		for ($day = 31; $day > 0; $day = $day - 1) {
			$d = array("index" => $day , "day" => $day);
			array_push($listDay, $d);
		}
		return $listDay;	
	}

	public static function getTotal($provider, $colname)
	{
		$total=0;
		foreach($provider->data as $data)
		{
			$t=$data->$colname;
			$total += $t;
		}
		return $total;
	}	
	
	public function getRstlId(){
		return Yii::app()->getModule('user')->user()->profile->getAttribute('pstc');
	}
}