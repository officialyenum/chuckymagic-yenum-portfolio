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
                                    @if ($user->role_id === 2)
                                        <form action="{{route('users.make-super-admin', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="float-left btn btn-rounded btn-success-rgba"><small style="font-size: 8"> Make Super Admin</small></button>

                                        </form>
                                        <form action="{{route('users.remove-admin', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="float-left btn btn-rounded btn-danger-rgba"><small style="font-size: 8"> Remove Admin</small></button>
                                        </form>
                                    @endif
                                    @if ($user->role_id === 1)
                                        @if ($user->id == 1)
                                        @else
                                            <form action="{{route('users.remove-super-admin', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="float-left btn btn-rounded btn-danger-rgba" style="font-size: 10"><small style="font-size: 10"> Remove Super Admin</small></button>
                                            </form>
                                        @endif
                                    @endif
                                    @if ($user->role_id === 3)
                                        <form action="{{route('users.make-admin', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-rounded btn-success-rgba" style="font-size: 10"><small style="font-size: 10"> Make Admin</small></button>
                                        </form>
                                        <form action="{{route('users.remove-writer', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-rounded btn-danger-rgba" style="font-size: 10"><small style="font-size: 10"> Remove Writer</small></button>
                                        </form>
                                    @endif
                                    @if ($user->role_id === 4)
                                        <form action="{{route('users.make-writer', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-rounded btn-success-rgba" style="font-size: 10"><small style="font-size: 10"> Make Writer</small></button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->trashed())
                                        <form action="{{route('restore-users', $user)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"  class="btn btn-primary btn-xs" style="font-size: 10"><i class="fa fa-recycle" aria-hidden="true"></i></button>
                                        </form>
                                        <button class="btn btn-warning btn-xs" style="font-size: 10" onclick="handleDelete({{ $user->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    @else
                                        <a href="{{ route('users.edit', $user)}}"  class="btn btn-primary btn-xs" style="font-size: 10"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{ route('users.destroy', $user)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" style="font-size: 10">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
