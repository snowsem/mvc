<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 13:15
 */

use App\Controller;
use App\Request;
use App\View;

class MainController extends Controller {

    public function index() {

        var_dump(Request::$params);

        return new View('main/index', ['var_name'=>'value']);

    }


}