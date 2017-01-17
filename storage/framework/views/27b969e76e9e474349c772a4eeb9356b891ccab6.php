<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title><?php $__env->startSection('title'); ?>  Chatbot <?php echo $__env->yieldSection(); ?></title>
    <?php $__env->startSection('meta_keywords'); ?>
        <meta name="keywords" content="Chatbot"/>
    <?php echo $__env->yieldSection(); ?> <?php $__env->startSection('meta_author'); ?>
        <meta name="author" content="hailt"/>


        <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>

    <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?php echo e(URL::asset('favicon.ico')); ?>">
        <style>
            .wrapper-page {
                margin: 5% auto;
                position: relative;
                width: 420px;
            }
            body {
                background: #ebeff2 !important;
                font-family: 'Noto Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                margin: 0;
                padding-bottom: 65px;
                overflow-x: hidden;
                color: #797979;
            }
            .wrapper-page .card-box {
                border: 1px solid rgba(54, 64, 74, 0.1);
            }

            .card-box {
                padding: 20px;
                border: 1px solid rgba(54, 64, 74, 0.05);
                -webkit-border-radius: 5px;
                border-radius: 5px;
                -moz-border-radius: 5px;
                background-clip: padding-box;
                margin-bottom: 20px;
                background-color: #ffffff;
            }
            .text-custom {
                color: #5fbeaa !important;
            }
            .panel-heading {
                background: #fff;
            }
            .form-signin{
                max-width: 420px;
                margin: 10px auto;
            }
            .form-control{
                height: 38px;
            }
            .add-on {
                margin-top: -41px;
            }
        </style>
</head>
<body class="login-body">
<div class="container">
    <div class="wrapper-page">
        <p align="center">
            <a href="/" title="Wevnal.co.jp">
                <img src="<?php echo e(asset('images/logo-mini.png')); ?>"/>
            </a>
        </p>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
</body>
<!-- Scripts -->

<script src="<?php echo e(elixir('js/app.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</html>