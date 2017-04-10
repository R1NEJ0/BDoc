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
                        <h5 class="pull-right"> 
                            Buscar:
                            <input type="text">
                            <input type="submit" class="btn btn-xs btn-primary">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Ordenar por <select name="" id="" value="1">
                                <option value="/index">ID</option>
                                <option value="/sortByUsername">Username</option>
                                <option value="/sortByEmail">Email</option>
                                <option value="/sortByRole">Rol</option>
                                <option value="/sortByLastUpdate">Última subida</option>
                                <option value="/sortByCharisma">Carisma</option>
                            </select>
                            <input type="submit" class="btn btn-xs btn-primary">
                        </h5>
                    </div>
                    <div class="panel-body">
                      @include('admin.partials.usertable')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection