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
        $c_img = $params['c_img'];
        $c_img_name = $params['c_img_name'];

        $c_email = $params['c_email'];
        $c_date =  date("Y-m-d H:i:s");
        $query = "INSERT INTO comments (c_author, c_email, c_text, c_date, c_published, c_img, c_img_name) VALUES ('$c_author', '$c_email', '$c_text', '$c_date', 0, '$c_img', '$c_img_name')";
        return DB::query($query);


    }
    public static function edit() {


        //пока отсутсвуют проверки, но для теста хватит
        var_dump(Request::$post_params);
        $c_id = Request::$post_params->c_id;
        $c_author = Request::$post_params->name;
        $c_text = Request::$post_params->text;
        $c_email = Request::$post_params->email;
        $c_published = Request::$post_params->c_published;

        $sql = "SELECT * FROM comments WHERE c_id = $c_id LIMIT 1 ";
        $result = DB::query($sql);
        $u = mysqli_fetch_assoc($result);
        $adm = 0;
        if(($u['c_author'] != $c_author) or ($u['c_text'] != $c_text) or ($u['c_email'] != $c_email)) {
            $adm = 1;
        }



        $c_date =  date("Y-m-d H:i:s");
        $sql = "UPDATE comments SET c_author ='$c_author', c_text='$c_text', c_email='$c_email',c_date='$c_date',c_published='$c_published',c_admin='$adm' WHERE c_id=$c_id";
        var_dump( DB::query($sql));
    }


}