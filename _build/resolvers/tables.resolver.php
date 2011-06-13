<?php
/**
* Creates the tables on install
*
* @package xgitdev
* @subpackage build
*/
if($object->xpdo) {
    switch($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('xgitdev.core_path',null,$modx->getOption('core_path').'components/xgitdev/').'model/';
            $modx->addPackage('xgitdev',$modelPath);

            $manager = $modx->getManager();
            $modx->setLogLevel(modX::LOG_LEVEL_ERROR);
            #$manager->createObjectContainer('xgitdevSite');
            $modx->setLogLevel(modX::LOG_LEVEL_INFO);
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('xgitdev.core_path',null,$modx->getOption('core_path').'components/xgitdev/').'model/';
            $modx->addPackage('xgitdev',$modelPath);
            $manager = $modx->getManager();
            $modx->setLogLevel(modX::LOG_LEVEL_ERROR);
            #$manager->removeObjectContainer('xgitdevSite');
            $modx->setLogLevel(modX::LOG_LEVEL_INFO);
            break;
    }
}
return true;
