<?php ob_end_clean();?>

<?php $__env->startSection('title'); ?> <?php echo e(trans('title.user')); ?> :: @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="clearfix add-btn">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo e(url('user/create')); ?>"><?php echo e(trans('button.add')); ?></a>
                </div>
            </div>
            <section class="panel">
                <header class="panel-heading"><?php echo e(trans('title.user')); ?></header>
                <div class="panel-body">
                    <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'form-horizontal', 'method' => 'GET']); ?>

                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon btn-default"><?php echo e(trans('field.email')); ?></span>
                                <?php echo Form::text('keyword',  Request::get('keyword',null),
                             ['id' => 'keyword','class' => 'form-control' ]); ?>

                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr role="row">
                            <th class="clientNo">No.</th>
                            <th class="clientStatus"><?php echo e(trans('field.status')); ?></th>
                            <th class="clientEmail"><?php echo e(trans('field.email')); ?></th>
                            <th class="clientCompany"><?php echo e(trans('field.company_name')); ?></th>
                            <th class="clientUrl"><?php echo e(trans('field.url')); ?></th>
                            <th class="clientName"><?php echo e(trans('field.person_charge')); ?></th>
                            <th class="clientAction"><?php echo e(trans('default.action')); ?></th>
                        </tr>
                        </thead>
                        <?php if($users && $users->count() > 0): ?>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e(($users->currentPage() - 1) * $users->perPage() + $i + 1); ?></td>
                                    <td><?php echo e(isset($contract_status[$user->contract_status]) ? $contract_status[$user->contract_status] : ''); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->company_name); ?></td>
                                    <td><?php echo e($user->url); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td class="center">
                                        <a href="<?php echo e(URL::route("user.edit","$user->id")); ?>" class="btn btn-info btn-sm edit"><?php echo e(trans('button.update')); ?></a>
                                        <?php if($user->id != $user_id): ?>
                                            <a class="btn btn-danger btn-sm btn-delete" data-button="<?php echo e($user->id); ?>"  data-from = "<?php echo e(URL::route("user.destroy",":id")); ?>" href="javascript:void(0)">
                                                <?php echo e(trans('button.delete')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        <?php else: ?>
                            <tr>
                                <td colspan="6"><h5> <?php echo e(trans('message.common_no_result')); ?></h5></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                    <?php if($users && $users->count() > 0): ?>
                        <?php echo e($users->render()); ?>

                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
    <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>