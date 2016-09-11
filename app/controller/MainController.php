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
            return new View('main/index_admin', ['comments'=>$comments->get_all_record()]);
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record()]);
        }


    }

    public function by_author() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {
            return new View('main/index_admin', ['comments'=>$comments->get_all_record_author()]);
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_author()]);
        }


    }

    public function by_mail() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {
            return new View('main/index_admin', ['comments'=>$comments->get_all_record_mail()]);
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_mail()]);
        }


    }
    public function by_date() {

        #var_dump(Request::$params);
        $comments = model('Comment');
        //var_dump($comments->get_all_record());
        if (Auth::is_auth() == true) {
            return new View('main/index_admin', ['comments'=>$comments->get_all_record_date()]);
        } else {
            return new View('main/index', ['comments'=>$comments->get_all_record_date()]);
        }


    }



}