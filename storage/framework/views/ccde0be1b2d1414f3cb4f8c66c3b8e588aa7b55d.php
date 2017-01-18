
<?php $__env->startSection('title'); ?><?php echo e(trans('title.setting')); ?> :: @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading"><?php echo e(trans('title.setting')); ?></header>
                <div class="panel-body">
                    <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::model($user,[ 'url' => 'account/update', 'method' => 'POST', 'class' => 'cmxform form-horizontal', 'role' => 'form']); ?>

                        <div class="form-group">
                            <?php echo Form::label('email', trans('field.email'), ['class' => 'col-md-2 control-label']); ?>

                            <div class="col-md-6">
                                <label id="accountEmail" class="control-label"><?php echo e($user->email); ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('name', trans('field.name'), ['class' => 'col-md-2 control-label required']); ?>

                            <div class="col-md-6">
                                <?php echo Form::text('name', null, ['id' => 'inputName', 'class' => "form-control"]); ?>

                                <?php if($errors->has('name')): ?>
                                    <label for="inputName" class="error"><?php echo e($errors->first('name')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_name', trans('field.company_name'), ['class' => 'col-md-2 control-label required']); ?>

                            <div class="col-md-6">
                                <?php echo Form::text('company_name', null, ['id' => 'inputCompanyName','class' => 'form-control']); ?>

                                <?php if($errors->has('company_name')): ?>
                                    <label for="inputCompanyName" class="error"><?php echo e($errors->first('company_name')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('url', trans('field.url'), ['class' => 'col-md-2 control-label']); ?>

                            <div class="col-md-6">
                                <?php echo Form::text('url', null, ['id' => 'inputUrl','class' => 'form-control']); ?>

                                <?php if($errors->has('url')): ?>
                                    <label for="inputUrl" class="error"><?php echo e($errors->first('url')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label']); ?>

                            <div class="col-md-3">
                                <?php echo Form::password('password', ['id' => 'inputPassword','class' => 'form-control']); ?>

                                <?php if($errors->has('password')): ?>
                                    <label for="inputPassword" class="error"><?php echo e($errors->first('password')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label']); ?>

                            <div class="col-md-3">
                                <?php echo Form::password(
                                'password_confirmation', ['id' => 'inputPasswordConfirmation','class' => 'form-control']); ?>

                                <?php if($errors->has('password_confirmation')): ?>
                                    <label for="inputPasswordConfirmation" class="error"><?php echo e($errors->first('password_confirmation')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('comment', trans('field.comment'), ['class' => "col-md-2 control-label"]); ?>

                            <div class="col-md-6">
                                <?php echo Form::textarea(
                                'comment', null, ['id' => 'inputComment','class' => 'form-control', 'row' => '6']); ?>

                                <?php if($errors->has('comment')): ?>
                                    <label for="inputComment" class="error"><?php echo e($errors->first('comment')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="columns separator"></div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-6">
                                <?php echo Form::submit(trans('button.update'), ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>