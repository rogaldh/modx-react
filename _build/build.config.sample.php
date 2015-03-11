<?php
// reporting
error_reporting(E_ALL ^E_NOTICE);
ini_set('display_errors', true);

/*
 * Include MODX config
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/core/config/config.inc.php';

/* define sources */
$root = dirname(dirname(__FILE__)).'/';

/*
 * Constants
 */
global $sources;
$sources = array(
  'root'            => $root,
  'build'           => $root . '_build/',
  'source_core'     => $root . 'core/components/'.PKG_PATH.'/',
  'source_assets'   => $root . 'assets/components/'.PKG_PATH.'/',
  'source_manager'  => $root . 'manager/components/'.PKG_PATH.'/',
);
$sources = array_merge($sources,array(
  'includes'          => $sources['build'] .'includes/',
  'builder_includes'  => $sources['build'] .'includes/builder/',
  'data'              => $sources['build'] .'data/',
  'properties'        => $sources['build'] .'data/properties/',
  'options'           => $sources['build'] .'options/',
  'resolvers'         => $sources['build'] .'resolvers/',
  'chunks'            => $sources['source_core'] .'elements/chunks/',
  'snippets'          => $sources['source_core'] .'elements/snippets/',
  'plugins'           => $sources['source_core'] .'elements/plugins/',
  'templates'         => $sources['source_core'] .'elements/templates/',
  'lexicon'           => $sources['source_core'] .'lexicon/',
  'docs'              => $sources['source_core'] .'docs/',
  'model'             => $sources['source_core'] .'model/',
));
unset($root);

require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once $sources['includes'] . 'functions.php';

$modx= new modX();
$modx->initialize('mgr');