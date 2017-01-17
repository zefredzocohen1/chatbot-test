<div class="modal delete-modal">
    <div class="modal-dialog">
        <div class="modal-content overlay-wrapper">
            <div class="modal-header">
                <h4 class="modal-title">{{{ trans('passwords.confirm')}}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['class' => 'form-horizontal', 'method' => 'GET']) !!}
                <div class="row delete-content">
                    <div class="col-md-3">
                        {!! Form::label('email', trans('passwords.emailAddress'))!!}
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('email', null, ['id' => 'resetEmail', 'class' => "form-control", 'placeholder' => trans('field.email')]) !!}
                    </div>
                </div>
                <div class="row delete-success">
                    <div class="col-md-12">
                        <p>
                            {{{ trans("message.reset_email_success") }}}
                        </p>
                    </div>
                </div>
                <div class="row delete-error">
                    <div class="col-md-12">
                        <p class="text-red">
                            {{{ trans("message.reset_email_error") }}}
                        </p>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin fa-2x"></i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-modal-close" data-dismiss="modal">{{{ trans('button.close')}}}</button>
                <button type="button" class="btn btn-danger btn-modal-reset">{{{ trans('button.reset')}}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@section('scripts')
    <script>
        var success = false;
        var id = '';
        $(function () {
            var urlSendMail = '{{ URL::route('user.reset') }}';
            $('.btn-reset').click(function(){
                deleteUrl = $(this).data('from');
                success = false;
                $('.btn-modal-reset').show();
                $('.overlay-wrapper .overlay').hide();
                $('.delete-modal .delete-content').show();
                $('.delete-modal .delete-error').hide();
                $('.delete-modal .delete-success').hide();
               // id = $(this).data('button');


                $('.delete-modal').modal({
                    backdrop: 'static',
                    keyboard: false
                })
            });

            $('.btn-modal-reset').on('click', function(evt) {
                $('.overlay-wrapper .overlay').show();
                $('.btn-modal-reset').hide();
                var email = $('#resetEmail').val();
                $.ajax({
                    url: urlSendMail,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": email
                    },
                    type: 'POST',
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
@endsection