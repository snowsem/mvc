<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:25
 */


use App\Controller;
use App\Request;

class StaticController extends Controller  {

    public function __construct()
    {
        var_dump(Request::$params);
    }

}