<?php
$chunks = include $sources['data'].'transport.chunks.php';

if (!is_array($chunks)) {
  $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
} else {
  $category->addMany($chunks);
  $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($chunks).' chunks.');
}

unset($chunks);