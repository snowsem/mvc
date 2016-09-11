<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 11.09.16
 * Time: 15:12
 */

#echo 'hello main template';
#var_dump($var_name);
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="/public/css/custom.css">



<body style="">
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Обратная связь</a>

        </div>

    </div>
</div>


<div class="container">
    <ul class="comments-list">
        <li class="comment">
            <a class="pull-left" href="#">
                <img class="avatar" src="http://bootdey.com/img/Content/user_3.jpg" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h4 class="user">Пятницкий Семен</h4>
                    <h5 class="time">11.09.2016 в 12:11</h5>
                </div>
                <p>Реализация MVC<br>fdasfa<br>fdasfa</p>
            </div>
        </li>
        <li class="comment">
            <a class="pull-left" href="#">
                <img class="avatar" src="http://bootdey.com/img/Content/user_3.jpg" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h4 class="user">Пятницкий Семен</h4>
                    <h5 class="time">11.09.2016 в 12:11</h5>
                </div>
                <p>Реализация MVC зация MVC зация MVC зация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVCзация MVC<br>fdasfa<br>fdasfa</p>
            </div>
        </li>
        </ul>


        <!-- Form
        ================================================== -->

        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component background-white">
                    <form class="form-horizontal" method="post" action="/comment/add">
                        <fieldset>
                            <legend><h4>Оставить отзыв</h4></legend>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Имя">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="inputEmail" name="E-mail" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group">

                                <!-- <label for="textArea" class="col-lg-2 control-label">Код</label> !-->
                                <div class="col-lg-10">
                                    <textarea class="form-control " rows="3" id="text" name="text" placeholder="Текст сообщения"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Предварительный просмотр</button>
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- Dialog
    ================================================== -->



    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>

    <script src="/public/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="/public/js/typeahead.js" type="text/javascript"></script>
    <script src="/public/js/jquery.mockjax.js" type="text/javascript"></script>
    <script src="/public/js/jquery.mask.min.js" type="text/javascript"></script>


</div>



</body></html>