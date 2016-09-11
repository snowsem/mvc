<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:19
 */
namespace App;

class Model {

    private $host;
    private $username;
    private $password;
    private $db;
    protected $init;

    function __construct() {
        $ini_array = parse_ini_file(CONFIG_PATH.DS."db.ini");
        //var_dump($ini_array);
        $this->host = $ini_array['host'];
        $this->username = $ini_array['username'];
        $this->password = $ini_array['password'];
        $this->db = $ini_array['db'];
        $this->connect();
        exit();
    }

    protected function connect() {
        $this->init = mysql_connect($this->host,$this->username,$this->password);
        if (!$this->init) {
            echo("<P>Cервер базы данных не доступен</P>");
            exit();
        }
        if (!@mysql_select_db($this->db, $this->init)) {
            echo( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
            exit();
        }
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET 'utf8'");
    }
}