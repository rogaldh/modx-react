<?php

$menus = array();

$action= $modx->newObject('modAction');
$action->fromArray(array(
  'id' => 1,
  'namespace' => NAMESPACE_NAME,
  'parent' => 0,
  'controller' => 'controllers/mgr/indexpanel',
  'haslayout' => true,
  'lang_topics' => NAMESPACE_NAME.':default',
  'assets' => '',
),'',true,true);

$menu = $modx->newObject('modMenu');
$menu->fromArray(array(
  'text' => NAMESPACE_NAME,
  'parent' => 'components',
  'description' => NAMESPACE_NAME.'.module_desc',
  'icon' => 'images/icons/plugin.gif',
  'menuindex' => 0,
  'params' => '',
  'handler' => '',
  'permissions'   => '',
  'namespace' => NAMESPACE_NAME,
),'',true,true);

$menu->addOne($action);
unset($action);

$menus[] = $menu;

return $menus;