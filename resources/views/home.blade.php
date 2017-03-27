@extends('layouts.loged')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil de {{ Auth::user()->username   }}</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="avatar" src="https://pbs.twimg.com/profile_images/418179395786784768/nT1N-1i3.jpeg" class="img-rounded img-responsive">
                            <br>
                            <a href="#" class="btn btn-warning">Editar Avatar</a>
                            <br>
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Último fichero:</td>
                                    <td>XX / XX / XX</td>
                                </tr>
                                <tr>
                                    <td>Días restantes:</td>
                                    <td>28 días</td>
                                </tr>
                                <tr>
                                    <td>Fecha de registro:</td>
                                    <td>XX / XX / XX</td>
                                </tr>
                                <tr>
                                    <td>Puntos de carisma: </td>
                                    <td>XXXXXXX</td>
                                </tr>
                                <tr>
                                    <td>Comentarios: </td>
                                    <td>XXX</td>
                                </tr>
                                <tr>
                                    <td>Número de ficheros subidos:</td>
                                    <td>XXXXXX</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>




                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">Ficheros subidos por {{ Auth::user()->username }} </h4>
                    <h5 class="pull-right">
                        Buscar:
                        <input type="text">
                        <input type="submit" class="btn btn-primary btn-xs" value="Dale!">
                    </h5>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Extensión
                            </th>
                            <th>
                                Tamaño
                            </th>
                            <th>
                                Likes
                            </th>
                            <th>
                                Dislikes
                            </th>
                            <th>
                                Comentarios
                            </th>
                            <th>
                                Acción
                            </th>
                        </tr>
                        <td>
                            <a href="/file">Nombre1Nombre1Nombre1Nombre1Nombre1Nombre1Nombre1</a>
                        </td>
                        <td>
                            Extensión1
                        </td>
                        <td>
                            Tamaño1
                        </td>
                        <td>
                            100
                        </td>
                        <td>
                            10
                        </td>
                        <td>
                            30
                        </td>
                        <td>
                            <a href="/editf" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Borrar</a>
                        </td>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
