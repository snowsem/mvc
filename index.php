<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:15
 */
ini_set('display_errors', 1);

define ('DS', DIRECTORY_SEPARATOR);

$core_path = realpath(dirname(__FILE__) . DS);

define('APP_PATH',  $core_path.'/app');
define('MODEL_PATH',  $core_path.'/app/model');

define ('CORE_PATH', $core_path.'/core');

define('START_WITH_DB', true);

require_once 'core/autoload.php';

