<div class="row">
    <div class="col-md-10 col-md-offset-1">


        @if(Session::has('message'))

            <p class="alert alert-success">{{ Session::get('message') }}</p>

        @endif


    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">

                <h4 class="pull-left">Ficheros subidos por {{ $user->username }} </h4>
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
                        <a href="{{ route('file.info', $file->id) }}">{{ $file->name  }}</a>
                    </td>
                    <td>
                        {{ $file->fileExtension }}
                    </td>
                    <td>
                        {{ $file->size }} MB
                    </td>
                    <td>
                        {{ $file->valorations->where('like', 1)->count() }}
                    </td>
                    <td>
                       {{ $file->valorations->where('like', 0)->count() }}
                    </td>
                    <td>
                        {{ $file->comments->count() }}
                    </td>

                    <td>
                        @if(Auth::user()->id === $file->user_id || Auth::user()->role === 'admin')
                        <a href="/file/edit/{{ $file->id }}" class="btn btn-primary">Editar</a>
                        <a href="/file/delete/{{ $file->id }}" class="btn btn-danger">Borrar</a>
                        @endif

                        <a href="/storage/{{ $file->url }}" class="btn btn-success">Descargar</a>
                    </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
