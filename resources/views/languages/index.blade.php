@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('languages.create')}}" class="btn btn-success float-right my-2">Add Language </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Languages
        </div>
        <div class="card-body">
            @if ($languages->count() > 0)
                <table class="table">
                    <thead>
                        <th scope="row">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Post Count</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <td>
                                    {{ $language->id }}
                                </td>
                                <td>
                                    <img src="{{asset($language->image)}}" alt="language image" width="40px"  height="40px">


                                </td>
                                <td>
                                    {{ $language->name }}
                                </td>
                                <td>
                                    {{ $language->projects->count() }}
                                </td>
                                <td>
                                    <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $language->id }})">Delete</button>
                                    <a href="{{ route('languages.edit', $language->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Delete Language</h5>
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
            @else
                <h3 class="text-center">No Languages Yet</h3>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/languages/' + id
            console.log('deleting', form);

            $('#deleteModal').modal('show')
        }
    </script>

@endsection
