<?php
//read params values from site-settings.ini file
$siteSettingsFile = dirname(__FILE__).'/site-settings.ini';
$siteSettings_array = parse_ini_file($siteSettingsFile,true);

$formSettingsFile = dirname(__FILE__).'/form-settings.ini';
$formSettings_array = parse_ini_file($formSettingsFile,true);
//$content = file_get_contents($file);
//$arr = unserialize(base64_decode($settings_array));
//return $arr;
//$arr = unserialize($settings_array);
return CMap::mergeArray(
        $siteSettings_array,
		$formSettings_array,
        array(
            'salt'=>'uL1m5w3b@ppL1c4710n',
            'adminEmail'=>'red_x88@yahoo.com, ronnelg_10@yahoo.com',
        )
    )
;
?>