<?php
$snippets = include $sources['data'].'transport.snippets.php';

if (!is_array($snippets)) {
  $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
} else {
  $category->addMany($snippets);
  $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($snippets).' snippets.');
}

unset($snippets);