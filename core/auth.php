<?php
/**
 * Created by PhpStorm.
 * User: snowsm
 * Date: 11.09.2016
 * Time: 21:12
 */

class Auth {
    public static function rum(){

        @session_start();

    }
    public static function set($key, $value) {

        $_SESSION[$key] = $value;
    }

    public static function get($key) {

        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function login($param){


        self::set('auth', true);
        self::set('username', $param);
        return true;

    }

    public static function logout(){
        session_destroy();
        return true;
    }

    public static function is_auth(){
        $logged = self::get('auth');
        if ($logged == true) {
            return true;
        }
        return false;
    }


}