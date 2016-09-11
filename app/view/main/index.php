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
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>

    <script src="/public/valid.js" type="text/javascript"></script>





    <script>
        $(document).ready(function() {
            $('form button[type="submit"]').on('click', function () {

                $("#form").validate({

                    rules: {
                        name: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        text: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        name: {
                            required: "Поле Имя обязательное для заполнения"
                        },
                        email: {
                            required: "Поле E-mail обязательное для заполнения",
                            email: "Введите пожалуйста корректный e-mail"
                        },
                        text: {
                            required: "Поле Имя обязательное для заполнения"
                        }
                    },
                    focusCleanup: true,
                    focusInvalid: false,
                    errorLabelContainer: ".js-form-message", wrapper: "li",

                    invalidHandler: function(event, validator) {

                    },
                    onkeyup: function(element) {
                        $(".js-form-message").text("");
                    },
                    errorPlacement: function(error, element) {
                        return true;
                    },
                    errorClass: "form-input_error",
                    validClass: "form-input_success"
                });


                //$(this).parents('form').submit();
            });
        });
    </script>




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
        <?php

        if(isset($comments)) {

            var_dump($comments);
            foreach ($comments as $c) {

                echo '<li class="comment">
            <a class="pull-left" href="#">
                <img class="avatar" src="/public/user_3.jpg" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h4 class="user">'.$c['c_author'].'</h4>
                    <h5 class="time">'.$c['c_date'].'</h5>
                </div>
                <p>'.$c['c_text'].'</p>
            </div>
        </li>';
            }
        }
        else {
            print "error";
            }


        ?>

        </ul>


        <!-- Form
        ================================================== -->

        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component background-white">
                    <form id="form" class="form-horizontal" method="post" action="/comment/create">
                        <fieldset>
                            <legend><h4>Оставить отзыв</h4></legend>
                            <p class="js-form-message"></p>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Имя">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="inputEmail" name="email" placeholder="E-mail">
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





</body></html>