<?php
$settings = include_once $sources['data'].'transport.settings.php';

$attributes= array(
    xPDOTransport::UNIQUE_KEY => 'key',
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => false,
);

if (!is_array($settings)) {
  $modx->log(modX::LOG_LEVEL_ERROR,'Adding settings failed.');
}
foreach ($settings as $setting) {
  $vehicle = $builder->createVehicle($setting,$attributes);
  $builder->putVehicle($vehicle);
}

$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($settings).' system settings.'); flush();
unset($settings,$setting,$attributes);