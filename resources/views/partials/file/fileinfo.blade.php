<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
                <div class="panel-heading clearfix">
                    {{ $file->name }}
                    <div class="pull-right">
                        @if(Auth::user()->id === $file->user_id || Auth::user()->role === 'admin')
                        <a href="/file/edit/{{ $file->id }}">Editar</a>
                            @endif
                    </div>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="avatar" src="/storage/{{ $file->thumbnailURL }}" class="img-rounded img-responsive">
                            <br><br>
                            <a href="/storage/{{ $file->url }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a>
                            <a href="/file/like/{{ $file->id }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                            <a href="/file/dislike/{{ $file->id }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a>
                            <a href="/file/comment/create={{ $file->id }}" class="btn btn-warning btn-sm">  <span class="glyphicon glyphicon-comment" ></span></a>
                            <br>
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <td>Tamaño:</td>
                                    <td>{{ $file->size }} MB</td>
                                </tr>
                                <tr>
                                    <td>Extensión: </td>
                                    <td> {{ $file->fileExtension }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de subida:</td>
                                    <td> {{ $file->day_uploaded }} </td>
                                </tr>
                                <tr>
                                    <td>Likes: </td>
                                    <td> {{ $sumaLikes }}</td>
                                </tr>
                                <tr>
                                    <td>Dislikes:</td>
                                    <td>{{ $sumaDislikes }}</td>
                                </tr>
                                <tr>
                                    <td>Uploader:</td>

                                @if($usuario)
                                    <td>El usuario ya no existe</td>
                                @else
                                    <td><a href="/profile/{{ $file->user->id }}">
                                        {{ $file->user->username }}
                                        </a></td>
                                 @endif

                                </tr>
                                <tr>
                                    <td>
                                        Tags:
                                    </td>
                                    <td>
                                        {{ $file->keywords }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Descripción:</td>
                                    <td>{{ $file->description }}</td>
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