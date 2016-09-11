<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 16:30
 */
use App\Model;


class CommentModel extends Model {

    public function get_all_record() {

        $sql = "SELECT * FROM comments";
        $result = DB::query($sql);
        $array = array();
        while($u = mysqli_fetch_assoc($result)) {
            $array[] = $u;

        }
        return $array;


    }

    public function get_all_record_author(){

    }

    public function get_all_record_mail(){

    }

    public function get_all_record_date(){

    }


}