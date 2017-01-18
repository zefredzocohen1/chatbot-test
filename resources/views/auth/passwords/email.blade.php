@extends('login')
@section('title') {{{ trans('default.forget_password') }}} :: @parent @stop

@section('content')
    {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center text-uppercase">{{{ trans('default.forget_password') }}}</h3>
        </div>
        <div class="panel-body">
            @include('errors.list')
            <div class="form-group">
                <div class="col-md-10">
                    {!! Form::text('email', null, ['id' => 'inputEmail', 'class' => "form-control", 'placeholder' => trans('field.email')]) !!}
                    <span class="input-group-btn add-on">
                         <button class="btn btn-sm btn-primary " type="submit">{{{ trans('button.reset_btn') }}}</button>
                      </span>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


