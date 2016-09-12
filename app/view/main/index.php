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
                            required: true,
                            email: true
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
        <form class="navbar-form" role="login" method="post" action="/auth/login">
            <div class="col-sm-1 col-md-2  navbar-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary input-ssx-btn ">Войти</button>
                </div>

            </div>
            <div class="col-sm-1 col-md-2  navbar-right">
                <div class="input-group">
                    <input type="text" class="form-control input-ssx" placeholder="Пароль" name="password">
                </div>
            </div>
            <div class="col-sm-1 col-md-2  navbar-right">
            <div class="input-group">
                <input type="text" class="form-control   input-ssx" placeholder="Логин" name="username">
            </div>
        </div>




        </form>

    </div>
</div>


<div class="container">
    <ul class="nav nav-pills">


        <li  <?php if(Router::$action=='index'){ print 'class="active"';}?> role="presentation" ><a href="/">Стандарт</a></li>
        <li  <?php if(Router::$action=='by_author'){ print 'class="active"';}?> role="presentation" ><a href="/main/by_author">По автору</a></li>
        <li  <?php if(Router::$action=='by_date'){ print 'class="active"';}?> role="presentation" ><a href="/main/by_date">По дате</a></li>
        <li  <?php if(Router::$action=='by_mail'){ print 'class="active"';}?> role="presentation" ><a href="/main/by_mail">По адресу</a></li>

    </ul>
    <ul class="comments-list">
        <?php

        if(isset($comments)) {

            //var_dump($comments);
            foreach ($comments as $c) {
                $admin = ($c['c_admin'] == 1 ? ' | Изменен администратором' : '');
                $img = ($c['c_img'] !=NULL ? '<img class="resize_img",, src="data:image/jpeg;base64,'.base64_encode( $c['c_img'] ).'"/>':'');

                echo '<li class="comment">
            <a class="pull-left" href="#">
                <img class="avatar" src="/public/user_3.jpg" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                <h5 class="time">'.$c['c_date'].'</h5><span>' .$admin.'</span><br>
                    <h4 class="user">'.$c['c_author'].'</h4><br>
                     <span>'.$c['c_email'].'</span>
                    
                </div>
                <p>'.$c['c_text'].'</p>
                 <p>'.$img.'</p>
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
                    <form id="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="/comment/create">
                        <fieldset>
                            <legend><h4>Оставить отзыв</h4></legend>
                            <p class="js-form-message"></p>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="inputName" name="name" placeholder="Имя">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" id="inputEmail" name="email" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group">


                                <div class="col-lg-10">
                                    <textarea class="form-control " rows="3" id="inputText" name="text" placeholder="Текст сообщения"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="col-lg-7">
                                    <input name="image" id="fileInput" type="file" /><br>
                                    <img id="pre" src="#" alt="pre" />
                                </div>


                            </div>


                            <div class="form-group">

                                <div class="col-lg-10">
                                    <!-- Button trigger modal -->

                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Предварительный просмотр</button>
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
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Предварительный просмотр</h4>
            </div>
            <div class="modal-body">
                <ul class="comments-list">
                    <li class="comment">
            <a class="pull-left" href="#">
                <img class="avatar" src="/public/user_3.jpg" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h5 class="time c_date"></h5><br>
                    <h4 class="user c_author"></h4><br>
                    <span class="c_email"></span>
                    
                </div>
                <p class="c_text"></p>
                <p class="c_img"></p>
            </div>
        </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            if (input.files[0].type.match('image.*')) {
                console.log("is an image");
                reader.onload = function (e) {
                    $('#pre').attr('src', e.target.result).show();
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#pre').hide();

            }


        }
    }
    $("#fileInput").change(function(){
        readURL(this);
    });
    $( ".modal" ).on('shown.bs.modal', function(e){
        console.log('open');
        $('.modal .modal-body .c_author').html($( "#inputName" ).val());
        $('.modal .modal-body .c_text').html($( "#inputText" ).val());
        $('.modal .modal-body .c_email').html($( "#inputEmail" ).val());
        $('.modal .modal-body .c_img').html($( "#pre" ));

        var date = new Date();//Thu Jul 26 2012 15:59:09 GMT+0400 ..
        var mon = ('0'+(1+date.getMonth())).replace(/.?(\d{2})/,'$1')
        var a=date.toString().replace(/^[^\s]+\s([^\s]+)\s([^\s]+)\s([^\s]+)\s([^\s]+)\s.*$/ig,'$3-'+mon+'-$2 $4')

        $('.modal .modal-body .c_date').html(a);

    });
</script>

</body></html>