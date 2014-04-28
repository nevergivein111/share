<?php

return array(
    'connectionString' => 'mysql:host=localhost;dbname=shareview',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'enableParamLogging'=>true,
    'initSQLs'=>array("set time_zone='+0:00';"), 
    //'schemaCachingDuration'=>60*60
);
