<?php ob_end_clean();?>
@extends('layouts.app')
@section('title') {{{ trans('title.dashboard') }}} :: @parent @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('flash')
            <div class="box_message"></div>
            <section class="panel service">
                <div class="panel-body service">
                    <div class="service-content">
                        @if((!isset($pageList) || count($pageList) <= 0))
                            <section class="panel col-md-12 add-grant-access">
                                <div class="panel-body clearfix add-btn">
                                    <div class="btn-group">
                                        @if(Auth::user()->authority == $authority['client'])
                                            <a class="btn btn-primary" href="{{'#'}}">{{{ trans('button.grant_access') }}}</a>
                                        @else
                                            <a class="btn btn-primary">aaaaaaaaaaaa</a>
                                        @endif
                                    </div>
                                </div>
                            </section>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
