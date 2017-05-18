@extends('layouts.loged')





@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class=" pull-left">Panel de Administración</h4>

                    </div>
                    <div class="panel-body">
                      @include('admin.partials.usertable')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection