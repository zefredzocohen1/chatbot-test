<?php $__env->startSection('title'); ?> <?php echo e(trans('default.forget_password')); ?> :: @parent  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => '/password/email', 'class' => 'form-horizontal', 'role' => 'form']); ?>

    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center text-uppercase"><?php echo e(trans('default.forget_password')); ?></h3>
        </div>
        <div class="panel-body">
            <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-group">
                <div class="col-md-10">
                    <?php echo Form::text('email', null, ['id' => 'inputEmail', 'class' => "form-control", 'placeholder' => trans('field.email')]); ?>

                    <span class="input-group-btn add-on">
                         <button class="btn btn-sm btn-primary " type="submit"><?php echo e(trans('button.reset_btn')); ?></button>
                      </span>
                </div>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>