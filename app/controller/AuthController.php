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


class AuthController extends Controller {

    public function login() {
        $ini_array = parse_ini_file(CONFIG_PATH.DS."auth.ini");

        if (Auth::is_auth() == true) {
            header('Location: '.'/');
        } else {

            if(($ini_array['username'] == Request::$post_params->username) && (($ini_array['password'] == Request::$post_params->password))) {
                Auth::login(Request::$post_params->username);
            } else {
                //flash text
                //var_dump(Request::$post_params);
            }
        }

       header('Location: '.'/');

        //return new View('main/index', ['comments'=>$comments->get_all_record()]);
    }

    public function logout() {
        Auth::logout();
        header('Location: '.'/');

    }



}