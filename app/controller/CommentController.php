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

class CommentController extends Controller {
    public function create() {
        echo 'post';
        #var_dump($_POST);
        var_dump(Request::$post_params);
        print Request::$post_params->name;
    }

}
