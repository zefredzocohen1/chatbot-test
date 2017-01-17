@extends('layouts.app')
@section('title'){{{ trans('title.setting') }}} :: @parent @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">{{{ trans('title.setting') }}}</header>
                <div class="panel-body">
                    @include('flash')
                    {!! Form::model($user,[ 'url' => 'account/update', 'method' => 'POST', 'class' => 'cmxform form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('email', trans('field.email'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                <label id="accountEmail" class="control-label">{{{ $user->email }}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', trans('field.name'), ['class' => 'col-md-2 control-label required']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['id' => 'inputName', 'class' => "form-control"]) !!}
                                @if ($errors->has('name'))
                                    <label for="inputName" class="error">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('company_name', trans('field.company_name'), ['class' => 'col-md-2 control-label required']) !!}
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
                        <div class="form-group">
                            {!! Form::label('contract_status', trans('field.status'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                <label class="control-label">{{{ isset($contract_status[$user->contract_status]) ? $contract_status[$user->contract_status] : '' }}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('field.password'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-3">
                                {!! Form::password('password', ['id' => 'inputPassword','class' => 'form-control']) !!}
                                @if ($errors->has('password'))
                                    <label for="inputPassword" class="error">{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', trans('field.password_confirmation'), ['class' => 'col-md-2 control-label']) !!}
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
                                {!! Form::submit(trans('button.update'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection