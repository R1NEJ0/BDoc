<table class="table table-striped">
    <tr>
        <th><a href="/index">#</a></th>
        <th><a href="/orderByUsername">Username</a></th>
        <th><a href="/orderByEmail">Email</a></th>
        <th><a href="/orderByRole">Rol</a></th>
        <th><a href="/orderByLastUpdate">Última subida</a></th>
        <th><a href="/orderByCharisma">Carisma</a></th>
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
            <td> {{ $user->last }} </td>
            <td> Carisma </td>
            <td><a href="{{ route('admin.user.profile', $user->id) }}" class="btn btn-success">Ver</a></td>
            <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Editar</a></td>
            <td><a href="{{ route('admin.user.destroy', $user->id) }}" class="btn btn-danger">Eliminar</a></td>


        </tr>
    @endforeach




</table>

<div>{{$users->render()}}</div>