<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 16:30
 */
use App\Model;


class CommentModel extends Model {


    private $host;
    private $username;
    private $password;
    private $db;
    protected $init;

    function __construct() {

        $ini_array = parse_ini_file(CONFIG_PATH.DS."db.ini");
        //var_dump($ini_array);
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db = 'mvc';
        $this->connect();
        exit();
    }

    protected function connect() {
        $this->init = mysqli_connect($this->host,$this->username,$this->password);
        if (!$this->init) {
            echo("<P>Cервер базы данных не доступен</P>");
            exit();
        }
        if (!@mysqli_select_db($this->db, $this->init)) {
            echo( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
            exit();
        }
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET 'utf8'");
    }
    public function get_all_record() {

    }

    public function get_all_record_author(){

    }

    public function get_all_record_mail(){

    }

    public function get_all_record_date(){

    }


}