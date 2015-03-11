<?php

class ExtraManagerController extends modExtraManagerController{
    
  public $module = 'samplepackage';
  public $module_name = 'SamplePackage';
    
  function __construct(modX &$modx, $config = array()) {
    parent::__construct($modx, $config);
    $this->config['namespace_assets_path'] = $modx->call('modNamespace','translatePath',array(&$modx, $this->config['namespace_assets_path']));
    $this->config['manager_url'] = $modx->getOption("{$this->module}.manager_url", null, $modx->getOption('manager_url')."components/{$this->module}/");
    $this->config['connectorsUrl'] = $this->config['manager_url'].'connectors/';
  }
  
  public static function getInstance(modX &$modx, $className, array $config = array()) {
    return parent::getInstance($modx, __CLASS__ , $config);
  }
  
  public function getOption($key, $options = null, $default = null, $skipEmpty = false){
    $options = array_merge($this->config, (array)$options);
    return $this->modx->getOption($key, $options, $default, $skipEmpty);
  }

  public function getLanguageTopics() {
    return array("{$this->module_name}:default");
  }
  
  public function initialize() {
    $assets_url = $this->modx->getOption('manager_url')."components/{$this->module}/";
    $this->config = array_merge($this->config, array(
      'assets_url'  => $assets_url,
    ));
    return parent::initialize();
  }
  

  function loadCustomCssJs(){
    parent::loadCustomCssJs();
    # $this->addJavascript($this->getOption('assets_url').'js/samplepackage.js'); 
    
    $this->addHtml('<script type="text/javascript">
      '.$this->module_name.'.config = '. $this->modx->toJSON($this->config).';
    </script>');
    
    return;
  }
  
  public function getTemplatesPaths($coreOnly = false) {
    $paths = parent::getTemplatesPaths($coreOnly);
    $paths[] = $this->config['namespace_path']."templates/default/";
    return $paths;
  }
  
  public function getTemplateFile() {
    return 'index.tpl';
  }
}