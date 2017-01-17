<?php $__env->startSection('title'); ?> <?php echo e(trans('title.title_login')); ?> :: @parent  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => 'login', 'class' => 'form-signin', 'role' => 'form']); ?>

    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center text-uppercase"><?php echo e(trans('button.login')); ?><br><strong class="text-custom"><?php echo e(trans('default.site_title')); ?></strong> </h3>
        </div>
        <div class="panel-body">
            <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::text('email', null, ['id' => 'inputEmail', 'class' => "form-control", 'placeholder' => trans('field.email')]); ?>

            <?php echo Form::password('password', ['id' => 'inputPassword', 'class' => "form-control", 'placeholder' => trans('field.password')]); ?>

            <?php echo Form::checkbox('remember', null, false); ?> &nbsp;<?php echo e(trans('button.remember_me')); ?>

            <button class="btn btn-lg btn-login btn-block" type="submit"><?php echo e(trans('button.login')); ?></button>
            <br />
            <a href="<?php echo e(url("/password/reset")); ?>" class="text-dark"><i class="fa fa-lock m-r-5"></i> <?php echo e(trans('default.forget_password')); ?></a>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>