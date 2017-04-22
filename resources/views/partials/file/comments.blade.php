<div class="row">
    <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>
@foreach($comentarios as $comentario)
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-left">Comentario de {{ $comentario->username }}, {{ $comentario->created_at }}.
                    @if($comentario->updated_at === null)
                </div>
                        @else
                    Editado {{ $comentario->updated_at }}</div>
                    @endif
                <div class="pull-right">
                    @if(Auth::user()->id === $file->user_id || Auth::user()->role === 'admin')
                    <a href="/file/comment/edit={{ $comentario->id }}">Editar</a>
                    <a href="/file/comment/delete={{$comentario->id}}">Eliminar</a>
                        @endif
                </div>
            </div>
            <div class="panel-body">

                {{ $comentario->comment }}

            </div>
        </div>
    </div>
</div>
</div>
    @endforeach




