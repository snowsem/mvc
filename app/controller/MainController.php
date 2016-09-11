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

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        return new View('main/index', ['comments'=>$comments->get_all_record()]);

    }



}