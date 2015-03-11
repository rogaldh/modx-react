<?php

$plugins = include $sources['data'].'transport.plugins.php';

if (!is_array($plugins)) {
  $modx->log(modX::LOG_LEVEL_FATAL,'Adding plugins failed.');
} 
else{
  $category->addMany($plugins);
  $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($plugins).' plugins.'); flush();
}

unset($plugins);