<?php
require_once dirname(dirname(__FILE__)).'/index.class.php';

class ControllersMgrIndexpanelManagerController extends ExtraManagerController{
    
  public static function getInstance(modX &$modx, $className, array $config = array()) {
    $className = __CLASS__;
    return new $className($modx, $config);
  }
  
  public function getLanguageTopics() {
    return array_merge(parent::getLanguageTopics(),array("{$this->module_name}:manager"));
  }
  
  public function initialize(){
    $this->modx->getVersionData();
    $modxVersion = $this->modx->version['full_version'];

    if (!version_compare($modxVersion, '2.2.6', '>=')) {
      return $this->failure("MODX 2.2.6 or highter required");
    }
    return parent::initialize();
  } 
  
  public function loadCustomCssJs() {
    parent::loadCustomCssJs();
    
    $assets_url = $this->getOption('manager_url');
    
    # include your libs here
    # $this->addJavascript($assets_url.'js/misc/functions.js');
    
    
    return;
  }
    
}