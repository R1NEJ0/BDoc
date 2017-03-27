<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Última subida</th>
        <th>Carisma</th>
        <th></th>
        <th>Acción</th>
        <th></th>
    </tr>


    @foreach($users as $user)
        <tr>

            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td> Última subida </td>
            <td> Carisma </td>
            <td><a href="#" class="btn btn-success">Ver</a></td>
            <td><a href="#" class="btn btn-primary">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>


        </tr>
    @endforeach




</table>

<div>{{$users->render()}}</div>