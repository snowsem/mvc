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
        if (Auth::is_auth() == true) {
            return new View('main/index_admin', ['comments'=>$comments->get_all_record_not_pub()]);
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record()]);
        }


    }

    public function by_author() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {
            header('Location: '.'/');
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_author()]);

        }


    }

    public function by_mail() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {

        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_mail()]);

        }


    }
    public function by_date() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {
            header('Location: '.'/');
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_date()]);

        }


    }



}