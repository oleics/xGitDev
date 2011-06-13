<?php
require_once dirname(dirname(__FILE__)).'/lib/xgitdev.class.php';
$xgitdev = new xGitDev($modx);
return $xgitdev->initialize('mgr');