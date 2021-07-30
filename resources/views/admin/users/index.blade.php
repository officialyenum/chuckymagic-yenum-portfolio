@extends('layouts.admin')

@section('title')
    User Management
@endsection

@section('style')
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('rightbar-content')
    <div class="card card-header">
        <div class="card-header">
            <h2>Users</h2>
        </div>
        @if ($users->count() > 0 )
            <div class="card-body">
                <div class="table-responsive">
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
            </div>
        @else
            <h3 class="text-center">No Users Yet</h3>
        @endif
    </div>

    <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteUserForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Are you sure you want to delete ?
                        </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, Go Back</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
<!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
    <script>
        $(function () {
            $('#userTable').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        })
    </script>
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteUserForm')
            form.action = 'posts/' + id
            console.log('deleting', form);

            $('#deleteModal').modal('show')
        }

        /* function showPost(post) {
            var post = post
            console.log(post)
            $('#postModal').val( post ).modal('show')
        } */
    </script>

@endsection
