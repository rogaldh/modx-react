<?php

$properties = $modx->resource->getOne('Template')->getProperties();

if(!empty($properties['tpl'])){
    $tpl = $properties['tpl'];
}
else{
    $tpl = 'index.tpl';
}

if ($modx->resource->cacheable != '1') {
    $modx->smarty->caching = false;
}

return preg_replace("/[ |\\r\\n]{2,}/","",$modx->smarty->fetch("tpl/{$tpl}"));
