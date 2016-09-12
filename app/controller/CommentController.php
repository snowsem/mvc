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
        $image = NULL;
        $image_name = NULL;

        if( ! is_uploaded_file($_FILES['image']['tmp_name']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK)
        {

        } else {
            $allow = array("jpg", "jpeg", "gif", "png");
            //$todir = PUBLIC_PATH.DS.'storage/';
            if ( !!$_FILES['image']['tmp_name'] )
            {
                $info = explode('.', strtolower( $_FILES['image']['name']) );
                if ( in_array( end($info), $allow) )
                {
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $image_name = addslashes($_FILES['image']['name']);
                }
                else
                {
                    // error this file ext is not allowed
                }
            }
        }

        $array = array(
            'c_author' => Request::$post_params->name,
            'c_email' => Request::$post_params->email,
            'c_text' => Request::$post_params->text,
            'c_img' => $image,
            'c_img_name'=> $image_name

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

