@extends('layouts.app')
@section('title')
    @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
        {{{ trans('title.user_register') }}}
    @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
        {{{ trans('title.user_edit') }}}
    @endif
    ::
@parent @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{!! URL::to('user') !!}"><i class="fa fa-bars"></i> {{{ trans('menu.user_list') }}}</a></li>
                <li class="active">
                    @if(!isset($user))
                        {{{ trans('title.user_register') }}}
                    @else
                        {{{ trans('title.user_edit') }}}
                    @endif
                </li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
                        {{{ trans('title.user_register') }}}
                    @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
                        {{{ trans('title.user_edit') }}}
                    @endif
                </header>
                <div class="panel-body">
                    @include('flash')
                    @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
                        {!! Form::open(['url' => 'user', 'class' => 'cmxform form-horizontal', 'role' => 'form']) !!}
                    @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
                        {!! Form::model($user,[ 'route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'cmxform form-horizontal', 'role' => 'form']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('email', trans('field.email'), ['class' => "col-md-2 control-label required"]) !!}
                        <div class="col-md-3">
                            {!! Form::text('email', null, ['id' => 'inputEmail','class' => 'form-control']) !!}
                            @if ($errors->has('email'))
                                <label for="inputEmail" class="error">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', trans('field.name'), ['class' => 'col-md-2 control-label required']) !!}
                        <div class="col-md-3">
                            {!! Form::text('name', null, ['id' => 'inputName', 'class' => "form-control"]) !!}
                            @if ($errors->has('name'))
                                <label for="inputName" class="error">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('company', trans('field.company_name'), ['class' => 'col-md-2 control-label required']) !!}
                        <div class="col-md-6">
                            {!! Form::text('company_name', null, ['id' => 'inputCompanyName','class' => 'form-control']) !!}
                            @if ($errors->has('company_name'))
                                <label for="inputCompanyName" class="error">{{ $errors->first('company_name') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', trans('field.url'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('url', null, ['id' => 'inputUrl','class' => 'form-control']) !!}
                            @if ($errors->has('url'))
                                <label for="inputUrl" class="error">{{ $errors->first('url') }}</label>
                            @endif
                        </div>
                    </div>
                    @if(ends_with(Route::currentRouteAction(), 'UserController@create')
                    || (ends_with(Route::currentRouteAction(), 'UserController@edit') && Auth::user()->id != $user->id))
                        <div class="form-group">
                            {!! Form::label('contract_status', trans('field.status'), ['class' => 'col-md-2 control-label required']) !!}
                            <div class="col-md-3">
                                {!! Form::select(
                                'contract_status',
                                $contract_status, null,
                                ['id' => 'selectStatus', 'class' => "form-control" ]
                                )!!}
                                @if ($errors->has('contract_status'))
                                    <label for="selectStatus" class="error">{{ $errors->first('contract_status') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('authority', trans('field.authority'), ['class' => 'col-md-2 control-label required']) !!}
                            <div class="col-md-3">
                                {!! Form::select(
                                'authority',
                                $group, null,
                                ['id' => 'selectAuthority', 'class' => "form-control" ]
                                )!!}
                                @if ($errors->has('authority'))
                                    <label for="inputAuthority" class="error">{{ $errors->first('authority') }}</label>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
                            {!! Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label required']) !!}
                        @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
                            {!! Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label']) !!}
                        @endif
                        <div class="col-md-3">
                            {!! Form::password('password', ['id' => 'inputPassword','class' => 'form-control']) !!}
                            @if ($errors->has('password'))
                                <label for="inputPassword" class="error">{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
                            {!! Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label required']) !!}
                        @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
                            {!! Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label']) !!}
                        @endif
                        <div class="col-md-3">
                            {!! Form::password(
                                'password_confirmation', ['id' => 'inputPasswordConfirmation','class' => 'form-control'])
                            !!}
                            @if ($errors->has('password_confirmation'))
                                <label for="inputPasswordConfirmation" class="error">{{ $errors->first('password_confirmation') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('comment', trans('field.comment'), ['class' => "col-md-2 control-label"]) !!}
                        <div class="col-md-6">
                            {!! Form::textarea(
                                'comment', null, ['id' => 'inputComment','class' => 'form-control', 'row' => '6'])
                            !!}
                            @if ($errors->has('comment'))
                                <label for="inputComment" class="error">{{ $errors->first('comment') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="columns separator"></div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-6">
                            @if(ends_with(Route::currentRouteAction(), 'UserController@create'))
                                <button class="btn btn-primary" type="submit">{{{ trans('button.add') }}}</button>
                            @elseif(ends_with(Route::currentRouteAction(), 'UserController@edit'))
                                <button class="btn btn-primary" type="submit">{{{ trans('button.update') }}}</button>
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection