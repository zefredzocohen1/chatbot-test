<div class="modal delete-modal">
    <div class="modal-dialog">
        <div class="modal-content overlay-wrapper">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(trans('default.confirm')); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row delete-content">
                    <div class="col-md-12">
                        <?php echo e(trans("message.model_delete_confirm")); ?>

                    </div>
                </div>
                <div class="row delete-success">
                    <div class="col-md-12">
                        <p>
                            <?php echo e(trans("message.modal_delete_success")); ?>

                        </p>
                    </div>
                </div>
                <div class="row delete-error">
                    <div class="col-md-12">
                        <p class="text-red">
                            <?php echo e(trans("message.common_error")); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin fa-2x"></i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-modal-close" data-dismiss="modal"><?php echo e(trans('button.close')); ?></button>
                <button type="button" class="btn btn-danger btn-modal-delete"><?php echo e(trans('button.delete')); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        var success = false;
        var id = '';
        $(function () {
            var deleteUrl = '';
            $('.btn-delete').click(function(){
                deleteUrl = $(this).data('from');
                success = false;
                $('.btn-modal-delete').show();
                $('.overlay-wrapper .overlay').hide();
                $('.delete-modal .delete-content').show();
                $('.delete-modal .delete-error').hide();
                $('.delete-modal .delete-success').hide();
                id = $(this).data('button');

                $('.delete-modal').modal({
                    backdrop: 'static',
                    keyboard: false
                })
            });

            $('.btn-modal-delete').on('click', function(evt) {
                $('.overlay-wrapper .overlay').show();
                $('.btn-modal-delete').hide();

                deleteUrl = deleteUrl.replace(':id',id);
                $.ajax({
                    url: deleteUrl,
                    data: { "_token": "<?php echo e(csrf_token()); ?>" },
                    type: 'DELETE',
                    success: function(data) {
                        $('.overlay-wrapper .overlay').hide();
                        $('.delete-modal .delete-content').hide();
                        $('.delete-modal .delete-error').hide();
                        $('.delete-modal .delete-success').show();
                        success = true;
                    },
                    error: function(result){
                        var text = $.parseJSON(result.responseText);
                        $('.overlay-wrapper .overlay').hide();
                        $('.delete-modal .delete-content').hide();
                        $('.delete-modal .delete-error .text-red').html(text.errors.msg);
                        $('.delete-modal .delete-error').show();
                        $('.delete-modal .delete-success').hide();
                    }
                });
            });

            $(".btn-modal-close").on('click', function(evt) {
                if(success){
                    location.reload();
                }
                return true;
            });

        });
    </script>
<?php $__env->stopSection(); ?>