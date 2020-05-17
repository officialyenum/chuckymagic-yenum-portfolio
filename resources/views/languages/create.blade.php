@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>
                {{ isset($language) ?'Edit Language':'Create Language' }}
            </h1>
        </div>
        <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($language) ? route('languages.update',$language->id) : route('languages.store')}}" method="POST">
            @csrf
            @if (isset($language))
                @method('PUT')
                <div class="form-group">
                <img src="{{ asset($language->image)}}" alt="image" width="100%">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ isset($language) ? $language->name : ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($language) ? 'Update Language' : 'Add Language' }}
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection
