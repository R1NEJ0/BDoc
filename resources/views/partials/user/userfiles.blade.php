<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Ficheros subidos por {{ $user->username }} </h4>
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
                    @foreach($files as $file)
                        <tr>
                    <td>
                        <a href="/file">{{ $file->name  }}</a>
                    </td>
                    <td>
                        {{ $file->fileExtension }}
                    </td>
                    <td>
                        {{ $file->size }} MB
                    </td>
                    <td>
                        {{ $likes }}
                    </td>
                    <td>
                        XX
                    </td>
                    <td>
                        XX
                    </td>
                    <td>
                        <a href="/editf" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Borrar</a>
                        <a href="#" class="btn btn-success">Descargar</a>
                    </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
</div>