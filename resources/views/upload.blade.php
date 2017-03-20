@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subir fichero</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="file" name="file ">

                            <br/>

                            <button type="submit" class="btn btn-primary">Subir fichero</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection