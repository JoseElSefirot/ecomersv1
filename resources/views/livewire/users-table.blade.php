<div>
    {{-- @include('sweetalert::alert') --}}

    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Busque por Nombre o Email" wire:model.live="search">
        </div>
    @if ($users->count())
        <div class="card-body">
            <table class="table table-striped table-responsive-lg table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>EDITAR</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @can('admin.users.edit')
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}"><i class="fas fa-edit"></i></a>
                            </td>
                        @endcan
                        @can('admin.users.destroy')
                            <td width="10px">
                                <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Eliminar</a>
                            </td>
                            {{-- <td width="10px">
                                <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                            </td> --}}
                        @endcan
                    </tr>
                    @endforeach
                </tbody><hr>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif

    </div>
</div>
