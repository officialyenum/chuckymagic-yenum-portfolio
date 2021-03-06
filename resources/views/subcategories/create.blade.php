@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>
                {{ isset($subcategory) ?'Edit Sub Category':'Create Sub Category' }}
            </h1>
        </div>
        <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($subcategory) ? route('subcategories.update',$subcategory->id) : route('subcategories.store')}}" method="POST">
            @csrf
            @if (isset($subcategory))
                @method('PUT')
                <div class="form-group">
                <img src="{{ asset($subcategory->image)}}" alt="image" width="100%">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ isset($subcategory) ? $subcategory->name : ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($subcategory) ? 'Update SubCategory' : 'Add SubCategory' }}
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection
