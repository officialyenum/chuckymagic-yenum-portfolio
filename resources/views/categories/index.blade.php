@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create')}}" class="btn btn-success float-right my-2">Add Category </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table">
                    <thead>
                        <th scope="row">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Post Count</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    <img src="{{asset($category->image)}}" alt="category image" width="40px"  height="40px">


                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->projects->count() }}
                                </td>
                                <td>
                                    <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $category->id }})">Delete</button>
                                    <a href="{{ route('categories.edit', $category->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
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
                                <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
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
                <h3 class="text-center">No Categories Yet</h3>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            console.log('deleting', form);

            $('#deleteModal').modal('show')
        }
    </script>

@endsection
