@extends('layouts.app')

@section('content')
    <div class="card card-header">
        <div class="card-header">
            <h2>Projects</h2>
        </div>
        @if ($projects->count() > 0 )
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <img src="{{ asset($project->image) }}" alt="post image" width="40px"  height="40px">
                                </td>
                                <td>
                                    {{ $project->title }}
                                </td>
                                <td>
                                    <a href="{{route('categories.edit', $project->category->id)}}">{{ $project->category->name}}</a>
                                </td>
                                <td>
                                    @if ($project->trashed())
                                            <form action="{{route('restore-projects', $project->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"  class="btn btn-primary float-right ml-1">Restore</button>
                                            </form>
                                    @else
                                            <a href="{{ route('projects.edit', $project->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                                    @endif

                                </td>
                                <td>
                                    @if ($project->trashed())
                                        <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $project->id }})">Delete</button>
                                    @else
                                        <form action="{{ route('projects.destroy', $project->id)}}" method="POST">
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
            <h3 class="text-center">No Posts Yet</h3>
        @endif
    </div>

    <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deletePostForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Project</h5>
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

    <script>
        function handleDelete(id) {
            var form = document.getElementById('deletePostForm')
            form.action = 'projects/' + id
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
