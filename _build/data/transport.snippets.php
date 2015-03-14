<?php

$snippets = array();

/* course snippets */

$list = array('react');

foreach($list as $v){

  $snippet_name = $v;
  $content = getSnippetContent($sources['snippets'] . $snippet_name . '.snippet.php');

  if(!empty($content)){
    $snippet = $modx->newObject('modSnippet');
    $snippet->fromArray(array(
      'name' => $snippet_name,
      'description' => $snippet_name.'_desc',
      'snippet' => $content,
      'source' => 1,
      'static' => true,
      'static_file' => str_replace($sources['root'],'',$sources['snippets'] . $snippet_name . '.snippet.php')
    ),'',true,true);
    $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.$snippet_name.' snippet.'); flush();

    $path = $sources['properties']."{$snippet_name}.snippet.properties.php";
    if(is_file($path)){
      $properties = include $path;
      $snippet->setProperties($properties);
      $modx->log(modX::LOG_LEVEL_INFO,'Adding properties for '.$snippet_name.' snippet.'); flush();
    }

    $snippets[] = $snippet;
  }

}

unset($properties,$snippet,$path,$snippet_name,$content,$list);
return $snippets;
