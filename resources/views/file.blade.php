@extends('layouts.loged')

@section('content')
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

                                <tr>
                                    <td>Tamaño:</td>
                                    <td>100 mb</td>
                                </tr>
                                <tr>
                                    <td>Extensión: </td>
                                    <td>rar</td>
                                </tr>
                                <tr>
                                    <td>Fecha de subida:</td>
                                    <td>XX / XX / XX    -     Hace XXX días</td>
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
                                    <td>User</td>
                                </tr>
                                <tr>
                                    <td>
                                        Tags:
                                    </td>
                                    <td>
                                        asd asd asd asd asd asd
                                    </td>
                                </tr>
                                <tr>
                                    <td>Descripción</td>
                                    <td>Esto es una descripción</td>
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

{{-- Sacar esto en un bucle 4each para que muestre los comentarios como cards --}}

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left">Comentario de Usuario, 22/03/13, editado 23/04/14</div>
                    <div class="pull-right">
                        <a href="/comment">Editar</a>
                        <a href="#">Eliminar</a>
                    </div>
                </div>
                <div class="panel-body">

                               Comentario

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-left">Comentario de Usuario, 10/01/12</div>
                <div class="pull-right">
                    <a href="/editc">Editar</a>
                    <a href="/deletec">Eliminar</a>
                </div>
            </div>
            <div class="panel-body">

                    Comentario

            </div>
        </div>
    </div>
</div>
</div>

@endsection
