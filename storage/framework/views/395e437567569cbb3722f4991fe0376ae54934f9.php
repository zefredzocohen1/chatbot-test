<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title><?php $__env->startSection('title'); ?>  CHATBOT <?php echo $__env->yieldSection(); ?></title>
    <?php $__env->startSection('meta_keywords'); ?>
        <meta name="keywords" content="CHATBOT"/>
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
        <!-- Scripts -->
        <script src="<?php echo e(elixir('js/app.js')); ?>"></script>
        <link rel="shortcut icon" href="<?php echo e(URL::asset('favicon.ico')); ?>">
</head>
<body>
<section id="container">
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section id="main-content">
        <section class="wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </section>
    
</section>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>