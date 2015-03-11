<?php

$modx->log(modX::LOG_LEVEL_INFO,'Packaging in menu...'); flush();

$menus = include $sources['data'].'transport.menu.php';

if (!is_array($menus)){
  
  $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in menu.');
  
}else{
  $attributes = array (
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::UNIQUE_KEY => 'text',
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
      'Action' => array (
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => array ('namespace','controller'),
      ),
    ),
  );
  
  foreach($menus as $menu){
    $vehicle= $builder->createVehicle($menu, $attributes);
    $builder->putVehicle($vehicle);
    $modx->log(modX::LOG_LEVEL_INFO,"Packaged in ".$menu->text." menu.");
  }
  unset($vehicle,$action);
}
