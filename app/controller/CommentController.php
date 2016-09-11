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
        $comment = model('Comment');
        $array = array(
            'c_author' => Request::$post_params->name,
            'c_email' => Request::$post_params->email,
            'c_text' => Request::$post_params->text

        );
        if ($comment->create($array)) {
            header('Location: '.'/');
        } else {
            echo 'error';
        }

    }

    public function edit() {
        $comment = model('Comment');

        return new View('comment/edit', ['comment'=>$comment->get_by_id(Request::$params[0])]);


    }

    public function edit_post() {
        $comment = model('Comment');
        $comment->edit();
        //return new View('comment/edit', ['comment'=>$comment->get_by_id(Request::$params[0])]);
         header('Location: '.'/');


    }




}

