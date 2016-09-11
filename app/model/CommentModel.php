<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 16:30
 */
use App\Model;
use App\Request;


class CommentModel extends Model {


    public function get_by_id($id) {

        $sql = "SELECT * FROM comments WHERE c_id = $id LIMIT 1 ";
        $result = DB::query($sql);

        $u = mysqli_fetch_assoc($result);

        return $u;


    }
    public function get_all_record() {

        $sql = "SELECT * FROM comments WHERE c_published = 1  ORDER BY c_date DESC ";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;
        }
        return $array;


    }
    public function get_all_record_not_pub() {

        $sql = "SELECT * FROM comments   ORDER BY c_date DESC ";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;
        }
        return $array;


    }

    public function get_all_record_author(){
        $sql = "SELECT * FROM comments WHERE c_published = 1 ORDER BY c_author";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;
        }
        return $array;

    }

    public function get_all_record_mail(){
        $sql = "SELECT * FROM comments WHERE c_published = 1 ORDER BY c_email";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;
        }
        return $array;

    }

    public function get_all_record_date(){
        $sql = "SELECT * FROM comments WHERE c_published = 1 ORDER BY c_date";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;
        }
        return $array;

    }

    public function create($params) {
        $c_author = $params['c_author'];
        $c_text = $params['c_text'];
        $c_email = $params['c_email'];
        $c_email = $params['c_email'];
        $c_date =  date("Y-m-d H:i:s");
        $query = "INSERT INTO comments (c_author, c_email, c_text, c_date, c_published) VALUES ('$c_author', '$c_email', '$c_text', '$c_date', 0)";
        return DB::query($query);


    }
    public static function edit() {
        var_dump(Request::$post_params);
        $c_author = Request::$post_params->name;
        $c_text = Request::$post_params->text;
        $c_id = Request::$post_params->c_id;
        $c_email = Request::$post_params->email;
        $c_published = Request::$post_params->c_published;
        $c_date =  date("Y-m-d H:i:s");
        $sql = "UPDATE comments SET c_author ='$c_author', c_text='$c_text', c_email='$c_email',c_date='$c_date',c_published='$c_published' WHERE c_id=$c_id";
        var_dump( DB::query($sql));
    }


}