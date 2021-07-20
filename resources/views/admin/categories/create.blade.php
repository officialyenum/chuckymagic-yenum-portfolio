@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>
                {{ isset($category) ?'Edit Category':'Create Category' }}
            </h1>
        </div>
        <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
                <div class="form-group">
                <img src="{{ asset($category->image)}}" alt="image" width="100%">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($category) ? 'Update Category' : 'Add Category' }}
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection
