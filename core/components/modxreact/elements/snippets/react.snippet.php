<?php
# $modx->setLogTarget('FILE');
if(!$modx->rest){
    
    $properties = array_merge(array($scriptProperties['properties']),array(
        'followLocation' => false, // due to open_basedir restrictions
        'freshConnect' => true,
        'timeout'=>4,
    ));
    
    $modx->getService('rest','rest.modRest',null,$properties);
    if(!$modx->rest){
        $modx->log(1,'Couldn\'t load rest client. It seems modRest hasn\'t been installed on the system');
        return;
    }
}

if(!$cmp = $scriptProperties['cmp']){
    $modx->log(1,'Component wasn\'t specified');
    return $scriptProperties['cmp'];
}


$_props = $scriptProperties;
foreach(array('url','cmp') as $k){
    if($_props[$k]) unset($_props[$k]);
}

$url = ($url = $scriptProperties['url']) ? $url : $modx->getOption('modxreact.host');
$response = $modx->rest->post($url, array(
    'params' => json_encode($_props),
    'assets' => $modx->getOption('modxreact.assets'),
    'static' => ($static = $scriptProperties['static']) ? $static : false,
    'cmp' => $cmp
));

if($response->responseError || $response->responseInfo->scalar != 200){
    $modx->log(1,"cURL request fail");
    $modx->log(1,"Error code " . $response->responseInfo->scalar );
    $modx->log(1,"Error " . $response->responseError);
    $modx->log(1,"Body:" . print_r($response->responseBody,1) );
    return $scriptProperties['cmp'];
}

return $response->responseBody;