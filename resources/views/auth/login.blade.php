@extends('login')
@section('title') {{{ trans('title.title_login') }}} :: @parent @stop

@section('content')
    {!! Form::open(['url' => 'login', 'class' => 'form-signin', 'role' => 'form']) !!}
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center text-uppercase">{{{ trans('button.login') }}}<br><strong class="text-custom">{{{ trans('default.site_title') }}}</strong> </h3>
        </div>
        <div class="panel-body">
            @include('errors.list')
            @include('flash')
            {!! Form::text('email', null, ['id' => 'inputEmail', 'class' => "form-control", 'placeholder' => trans('field.email')]) !!}
            {!! Form::password('password', ['id' => 'inputPassword', 'class' => "form-control", 'placeholder' => trans('field.password')]) !!}
            {!! Form::checkbox('remember', null, false) !!} &nbsp;{{{ trans('button.remember_me') }}}
            <button class="btn btn-lg btn-login btn-block" type="submit">{{{ trans('button.login') }}}</button>
            <br />
            <a href="{{url("/password/reset")}}" class="text-dark"><i class="fa fa-lock m-r-5"></i> {{{ trans('default.forget_password')}}}</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


