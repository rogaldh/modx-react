<?php

$mediaSources = include $sources['data'].'transport.mediasources.php';
if (!is_array($mediaSources)){
  $modx->log(modX::LOG_LEVEL_ERROR,'Adding MediaSources failed.'); }
else{
  $vehicleParams = array(
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => false,
    xPDOTransport::UNIQUE_KEY => 'name',
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
      'Snippets' => array(
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'name',
      ),
      'Chunks' => array(
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'name',
      ),
    ),
  );

  foreach($mediaSources as & $mediaSource){
    $vehicle = $builder->createVehicle($mediaSource, $vehicleParams);
    $builder->putVehicle($vehicle);
  }
  $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($mediaSources).' MediaSources.'); flush();
}
unset($mediaSources,$vehicle,$vehicleParams);
