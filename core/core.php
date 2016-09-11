<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 13:23
 */

namespace App;
require_once "controller.php";
require_once "view.php";
require_once "model.php";
require_once "Request.php";


class Core {

    public static function error_load_controller($controller_name = '') {
        exit("Не найден файл контроолера "  . $controller_name);
    }

}