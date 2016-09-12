<?php
/**
 * Created by PhpStorm.
 * User: snowsm
 * Date: 11.09.2016
 * Time: 22:34
 */

?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="/public/css/custom.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/bootstrap.min.js"></script>

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
                            required: true

                        },
                        text: {
                            required: true

                        }
                    },
                    messages: {
                        name: {
                            required: "Поле Имя обязательное для заполнения"
                        },
                        email: {
                            required: "Поле E-mail обязательное для заполнения"

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
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Личный кабинет <b class="caret"></b></a>
                <ul class="dropdown-menu">


                    <li class="dropdown-header"><?php print Auth::get("username")?></li>

                    <li><a href="/auth/logout">Выход</a></li>
                </ul>
            </li>


        </ul>

    </div>
</div>


<div class="container">


    <!-- Form
    ================================================== -->

    <div class="row">
        <div class="col-lg-6">
            <div class="well bs-component background-white">
                <form id="form" class="form-horizontal" method="post" action="/comment/edit_post">
                    <fieldset>
                        <legend><h4>Отзыв ID: <?php print $comment['c_id']?></h4></legend>
                        <p class="js-form-message"></p>
                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Имя" value="<?php print $comment['c_author']?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="text" class="form-control input-sm" id="inputEmail" name="email" placeholder="E-mail" value="<?php print $comment['c_email']?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <!-- <label for="textArea" class="col-lg-2 control-label">Код</label> !-->
                            <div class="col-lg-10">
                                <textarea class="form-control " rows="3" id="text" name="text" placeholder="Текст сообщения"><?php print $comment['c_text']?></textarea>

                            </div>
                        </div>
                        <div class="form-group">

                            <!-- <label for="textArea" class="col-lg-2 control-label">Код</label> !-->
                            <div class="col-lg-10">
                                <select name="c_published">
                                    <?php if ($comment['c_published']==1) {
                                        print '<option value="1" selected>Опубликован</option>
                                    <option value="0">Не опубликован</option>';

                                    } else {
                                        print '<option value="1" >Опубликован</option>
                                    <option value="0" selected>Не опубликован</option>';

                                    }
                                    ?>

                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="hidden" name="c_id" value="<?php print $comment['c_id']?>">
                                
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
