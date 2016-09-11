<?php
/**
 * Created by PhpStorm.
 * User: snowsm
 * Date: 11.09.2016
 * Time: 19:48
 */


class DB {
    //потом реализую PDO
    public static $link;
    public static $sql;
    public static $result;


    public static function run() {
        //echo 'run db class';
        $ini_array = parse_ini_file(CONFIG_PATH.DS."db.ini");
        //var_dump($ini_array);
        self::$link = mysqli_connect ($ini_array['host'],$ini_array['username'],$ini_array['password'],$ini_array['db']);
        mysqli_set_charset(self::$link, "utf8");

    }
    public static function query($sql) {
        return mysqli_query(self::$link, $sql);

    }

}