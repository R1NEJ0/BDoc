<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
                <div class="panel-heading clearfix">
                    Nombre fichero
                    <div class="pull-right"><a href="/editf">Editar</a></div>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="avatar" src="http://imagecache5d.allposters.com/watermarker/15-1555-PN9DD00Z.jpg?ch=948&cw=633" class="img-rounded img-responsive">
                            <br><br>
                            <a href="#" class="btn btn-primary btn-sm">Descargar</a>
                            <a href="#" class="btn btn-success btn-sm">Like</a>
                            <a href="#" class="btn btn-danger btn-sm">Dislike</a>
                            <br>
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-striped">
                                <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td>Tamaño:</td>
                                    <td>{{ $file->size }}</td>
                                </tr>
                                <tr>
                                    <td>Extensión: </td>
                                    <td>{{ $file->fileExtension }}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de subida:</td>
                                    <td>{{ $file->created_at }} -     Hace XXX días</td>
                                </tr>
                                <tr>
                                    <td>Likes: </td>
                                    <td>XXX</td>
                                </tr>
                                <tr>
                                    <td>Dislikes:</td>
                                    <td>XXX</td>
                                </tr>
                                <tr>
                                    <td>Uploader:</td>
                                    <td>{{ $file->user_id }}</td>
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
                                    <td>Descripción</td>
                                    <td>{{ $file->description }}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>