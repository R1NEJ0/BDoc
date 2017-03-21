@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subir fichero</div>

                    <div class="panel-body">
                        <form action="{{('/upload')}}" method="post" role="form" class="form-horizontal"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="file" class="col-md-4 control-label">Fichero</label>
                                <div class="col-md-6">
                                    <input type="file" id="file" name="file" class="form-control">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


