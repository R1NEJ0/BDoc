<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil de {{ $user->username}}</div>
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
                                    <td> {{ $ultimofichero }}</td>
                                </tr>
                                <tr>
                                    <td>Días restantes para el ban:</td>
                                    <td>{{$tiempo}} días</td>
                                </tr>
                                <tr>
                                    <td>Fecha de registro:</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Puntos de carisma: </td>
                                    <td>{{ $carisma }}</td>
                                </tr>
                                <tr>
                                    <td>Comentarios: </td>
                                    <td> {{ $mensajes }}</td>
                                </tr>
                                <tr>
                                    <td>Número de ficheros subidos:</td>
                                    <td>{{ $files->count() }}</td>
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