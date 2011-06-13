<?php
/**
 * xGitDev
 * 
 * @created 2011/06/13
 * @author Oliver Leics
 * @version 1.0.0
 * 
 */

class xGitDev {

    function __construct(modX &$modx, array $config = array()) {
        $this->modx =& $modx;
        
        $corePath = $modx->getOption('xgitdev.core_path',null,$modx->getOption('core_path').'components/xgitdev/');
        $assetsUrl = $modx->getOption('xgitdev.assets_url',null,$modx->getOption('assets_url').'components/xgitdev/');
        
        $this->config = array_merge(array(
            
            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'processorsPath' => $corePath.'processors/',
            'controllersPath' => $corePath.'controllers/',
            'includesPath' => $corePath.'includes/',

            'baseUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl.'css/',
            'jsUrl' => $assetsUrl.'js/',
            'tplUrl' => $assetsUrl.'tpl/',
            
            'elementId' => 'xgitdev-panel-home-div',
            'auth' => $modx->site_id,
            
            'connectorUrl' => $assetsUrl.'connector.php'
            
        ), $config);
        
        $this->modx->addPackage('xgitdev',$this->config['modelPath']);
            // $manager = $this->modx->getManager();
            // $manager->createObjectContainer('xgitdevSite');
        $this->modx->lexicon->load('xgitdev:default');
        
    }
    
    public function initialize() {
        $modx =& $this->modx;
        // 
        $modx->regClientStartupScript($this->config['jsUrl'].'mgr/xgitdev.js');
        $modx->regClientStartupHTMLBlock('<script type="text/javascript">
            Ext.onReady(function() {
                xGitDev.config = '.$modx->toJSON($this->config).';
            });
        </script>');
        // 
        $output = '<div id="'.$this->config['elementId'].'"></div>';
        return $output;
    }
}
