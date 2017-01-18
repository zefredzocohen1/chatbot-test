<?php ob_end_clean();?>
@extends('layouts.app')
@section('title') {{{ trans('title.user') }}} :: @parent @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="clearfix add-btn">
                <div class="btn-group">
                    <a class="btn btn-primary" href="{{ url('user/create') }}">{{{ trans('button.add') }}}</a>
                </div>
            </div>
            <section class="panel">
                <header class="panel-heading">{{{ trans('title.user') }}}</header>
                <div class="panel-body">
                    @include('flash')
                    {!! Form::open(['class' => 'form-horizontal', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon btn-default">{{{ trans('field.email') }}}</span>
                                {!! Form::text('keyword',  Request::get('keyword',null),
                             ['id' => 'keyword','class' => 'form-control' ]) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr role="row">
                            <th class="clientNo">No.</th>
                            <th class="clientEmail">{{{ trans('field.email') }}}</th>
                            <th class="clientCompany">{{{ trans('field.company_name') }}}</th>
                            <th class="clientUrl">{{{ trans('field.url') }}}</th>
                            <th class="clientName">{{{ trans('field.person_charge') }}}</th>
                            <th class="clientAction">{{{ trans('default.action') }}}</th>
                        </tr>
                        </thead>
                        @if($users && $users->count() > 0)
                            <tbody>
                            @foreach($users as $i => $user)
                                <tr>
                                    <td>{{{ ($users->currentPage() - 1) * $users->perPage() + $i + 1 }}}</td>
                                    <td>{{{ $user->email }}}</td>
                                    <td>{{{ $user->company_name }}}</td>
                                    <td>{{{ $user->url }}}</td>
                                    <td>{{{ $user->name }}}</td>
                                    <td class="center">
                                        <a href="{{ URL::route("user.edit","$user->id") }}" class="btn btn-info btn-sm edit">{{{ trans('button.update') }}}</a>
                                        @if($user->id != $user_id)
                                            <a class="btn btn-danger btn-sm btn-delete" data-button="{{{$user->id}}}"  data-from="{{ URL::route("user.destroy",":id") }}" >
                                                {{{ trans('button.delete')}}}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @else
                            <tr>
                                <td colspan="6"><h5> {{{ trans('message.common_no_result')}}}</h5></td>
                            </tr>
                        @endif
                    </table>
                    @if($users && $users->count() > 0)
                        {{{  $users->render() }}}
                    @endif
                </div>
            </section>
        </div>
    </div>
    @include('modals.delete')
@endsection