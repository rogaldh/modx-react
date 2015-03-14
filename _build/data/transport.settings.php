<?php

$settings = array();

$setting_name = PKG_NAME_LOWER.'.assets';
$setting = $modx->newObject('modSystemSetting');
$setting->fromArray(array(
 'key' => $setting_name,
 'value' => '{assets_path}components/modxsite/templates/bundle/',
 'xtype' => 'textfield',
 'namespace' => NAMESPACE_NAME,
 'area' => 'default',
),'',true,true);

$settings[] = $setting;

$setting_name = PKG_NAME_LOWER.'.host';
$setting = $modx->newObject('modSystemSetting');
$setting->fromArray(array(
 'key' => $setting_name,
 'value' => '127.0.0.1:6969',
 'xtype' => 'textfield',
 'namespace' => NAMESPACE_NAME,
 'area' => 'default',
),'',true,true);

$settings[] = $setting;

unset($setting,$setting_name);
return $settings;
