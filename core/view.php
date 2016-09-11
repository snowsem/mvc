<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:19
 */
namespace App;

class View
{
    private $data = array();

    private $render = FALSE;

    public function __construct($template, $vars = FALSE)
    {

            $file = APP_PATH.'/view/' . strtolower($template) . '.php';

            if (file_exists($file)) {

                $this->render = $file;

                $this->data = $vars;
                extract($this->data);
                include($this->render);

            } else {

                echo $file;
                exit('Шаблон ' . $template . ' не найден!');

            }

    }




}
?>