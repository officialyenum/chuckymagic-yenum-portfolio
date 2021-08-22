<div class="card card-header mb-5">
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <!-- /.card-header -->
        @if ($users->count() > 0 )
            <div class="card-body">
                <table id="userTable" class="display table table-striped table-bordered">
                    <thead>
                        <th></th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Online</th>
                        <th>Last Seen</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @if ($user->isOnline())
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->last_seen }}
                                </td>
                                <td>
                                    {{ $user->posts->count()}}
                                </td>
                                <td>
                                    {{ $user->comments->count()}}
                                </td>
                                <td>
                                    {{ $user->role->name }}
                                    @if ($user->isAdmin())
                                        <form action="{{route('users.make-super-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Make Super Admin</button>
                                        </form>
                                        <form action="{{route('users.remove-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Remove Admin</button>
                                        </form>
                                    @endif
                                    @if ($user->isSuperAdmin())
                                        @if ($user->id == 1)
                                        @else
                                            <form action="{{route('users.remove-super-admin', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Remove Super Admin</button>
                                            </form>
                                        @endif
                                    @endif
                                    @if ($user->isWriter())
                                        <form action="{{route('users.make-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                        </form>
                                        <form action="{{route('users.remove-writer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Remove Writer</button>
                                        </form>
                                    @endif
                                    @if ($user->isGuest())
                                        <form action="{{route('users.make-writer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Make Writer</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->trashed())
                                        <form action="{{route('restore-users', $user->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"  class="btn btn-primary float-right ml-1">Restore</button>
                                        </form>
                                        <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $user->id }})">Delete</button>
                                    @else
                                        <a href="{{ route('users.edit', $user->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right ml-1">
                                                Trash
                                            </button>
                                        </form>
                                    @endif
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
