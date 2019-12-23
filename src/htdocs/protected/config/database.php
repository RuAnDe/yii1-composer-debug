<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	'connectionString' => 'mysql:host=db;dbname=rms',
	'tablePrefix' => 'rms_',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'qW1234',
	'charset' => 'utf8',
	'enableProfiling'=>true,
	'enableParamLogging'=>true,
);