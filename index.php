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
define ('CORE_PATH', $core_path.'/core');

require_once 'core/autoload.php';

