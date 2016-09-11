<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 12:17
 */



function model($model_name) {

    $file_model = strtolower($model_name) . 'Model.php';
    $file_model_path = MODEL_PATH.DS . $file_model;

    if (file_exists($file_model_path))
    {
        $model_name_return = $model_name . 'Model';
        include $file_model_path;
        return new $model_name_return;
    }
    else
    {
        Core::error_load_model($model_name);

    }

}
require_once CORE_PATH.DS."core.php";
require_once CORE_PATH.DS."router.php";
Router::run();
#еще не разобрался как в неймспейс добавить модель
#буду пока дергать функцию загруки модели)

