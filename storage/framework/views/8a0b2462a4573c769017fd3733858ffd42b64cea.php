
<?php $__env->startSection('title'); ?>
    <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
        <?php echo e(trans('title.user_register')); ?>

    <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
        <?php echo e(trans('title.user_edit')); ?>

    <?php endif; ?>
    ::
@parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?php echo URL::to('user'); ?>"><i class="fa fa-bars"></i> <?php echo e(trans('menu.user_list')); ?></a></li>
                <li class="active">
                    <?php if(!isset($user)): ?>
                        <?php echo e(trans('title.user_register')); ?>

                    <?php else: ?>
                        <?php echo e(trans('title.user_edit')); ?>

                    <?php endif; ?>
                </li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
                        <?php echo e(trans('title.user_register')); ?>

                    <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
                        <?php echo e(trans('title.user_edit')); ?>

                    <?php endif; ?>
                </header>
                <div class="panel-body">
                    <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
                        <?php echo Form::open(['url' => 'user', 'class' => 'cmxform form-horizontal', 'role' => 'form']); ?>

                    <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
                        <?php echo Form::model($user,[ 'route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'cmxform form-horizontal', 'role' => 'form']); ?>

                    <?php endif; ?>
                    <div class="form-group">
                        <?php echo Form::label('email', trans('field.email'), ['class' => "col-md-2 control-label required"]); ?>

                        <div class="col-md-3">
                            <?php echo Form::text('email', null, ['id' => 'inputEmail','class' => 'form-control']); ?>

                            <?php if($errors->has('email')): ?>
                                <label for="inputEmail" class="error"><?php echo e($errors->first('email')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('name', trans('field.name'), ['class' => 'col-md-2 control-label required']); ?>

                        <div class="col-md-3">
                            <?php echo Form::text('name', null, ['id' => 'inputName', 'class' => "form-control"]); ?>

                            <?php if($errors->has('name')): ?>
                                <label for="inputName" class="error"><?php echo e($errors->first('name')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('company', trans('field.company_name'), ['class' => 'col-md-2 control-label required']); ?>

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
                            <input id="inputUrl" class="form-control " name="url" type="url" value="">
                            <?php if($errors->has('url')): ?>
                                <label for="inputUrl" class="error"><?php echo e($errors->first('url')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')
                    || (ends_with(Route::currentRouteAction(), 'UserController@edit') && Auth::user()->id != $user->id)): ?>
                        <div class="form-group">
                            <?php echo Form::label('authority', trans('field.authority'), ['class' => 'col-md-2 control-label required']); ?>

                            <div class="col-md-3">
                                <?php echo Form::select('authority',$group, null,['id' => 'selectAuthority', 'class' => "form-control" ]); ?>

                                <?php if($errors->has('authority')): ?>
                                    <label for="inputAuthority" class="error"><?php echo e($errors->first('authority')); ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
                            <?php echo Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label required']); ?>

                        <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
                            <?php echo Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label']); ?>

                        <?php endif; ?>
                        <div class="col-md-3">
                            <?php echo Form::password('password', ['id' => 'inputPassword','class' => 'form-control']); ?>

                            <?php if($errors->has('password')): ?>
                                <label for="inputPassword" class="error"><?php echo e($errors->first('password')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
                            <?php echo Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label required']); ?>

                        <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
                            <?php echo Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label']); ?>

                        <?php endif; ?>
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
                            <?php if(ends_with(Route::currentRouteAction(), 'UserController@create')): ?>
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('button.add')); ?></button>
                            <?php elseif(ends_with(Route::currentRouteAction(), 'UserController@edit')): ?>
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('button.update')); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>