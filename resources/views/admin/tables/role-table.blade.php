<div class="card card-header mb-5">
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <!-- /.card-header -->
        @if ($roles->count() > 0 )
            <div class="card-body">
                <table id="userTable" class="display table table-striped table-bordered">
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $role->status }}
                                </td>
                                <td>
                                    {{-- @if ($user->trashed())
                                        <form action="{{route('restore-users', $role->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"  class="btn btn-primary float-right ml-1">Restore</button>
                                        </form>
                                        <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $user->id }})">Delete</button>
                                    @else
                                        <a href="{{ route('roles.edit', $role->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                                        <form action="{{ route('users.destroy', $role->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right ml-1">
                                                Trash
                                            </button>
                                        </form>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3 class="text-center">No {{$title}} Yet</h3>
        @endif
    <!-- /.card-body -->
    </div>
</div>
