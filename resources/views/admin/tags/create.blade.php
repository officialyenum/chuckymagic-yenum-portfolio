@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>
                {{ isset($tag) ?'Edit Framework':'Create Framework' }}
            </h1>
        </div>
        <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
            @csrf
            @if (isset($tag))
                @method('PUT')
                <div class="form-group">
                <img src="{{ asset($tag->image)}}" alt="image" width="100%">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($tag) ? 'Update Framework' : 'Add Framework' }}
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection
