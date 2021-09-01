@extends('layouts.admin')

@section('title')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Post Management</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    {{-- <button class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>ADD</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
@endsection

@section('styles')
    {{-- flat pickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('rightbar-content')


    <div class="card card-default pb-4 mb-4">
        <div class="card-header">
            <h1>
                {{ isset($post) ? 'Edit Post' : 'Create Post' }}
            </h1>
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ isset($post) ? $post->title : '' }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                        class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (isset($post))
                                @if ($category->id == $post->category_id)
                                    selected
                                @endif
                        @endif
                        >
                        {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group bg-dark rounded text-white">
                    <label for="content" class="pl-4 pt-2">Content</label>
                    <textarea name="content" id="summernote">{!! isset($post) ? $post->content : '' !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" class="form-control" name="published_at" id="published_at"
                        value="{{ isset($post) ? $post->published_at : '' }}">
                </div>
                @if (isset($post))
                    <div class="form-group">
                        <img src="{{ asset($post->featured_image) }}" alt="image" width="100%">
                    </div>

                @endif
                {{-- <label for="image">Image</label>
        <div class="form-group input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="form-control custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image">Choose Image</label>
            </div>
        </div> --}}
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        @if ($tags->count() > 0)
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if (isset($post))
                            @if ($post->hasTag($tag->id))
                                selected
                            @endif
                            @endif
                        >
                        {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <label for="basic-url">GitHub Repo URL</label>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://github.com/usersname/</span>
                </div>
                <input type="text" class="form-control" name="github_url" id="github_url" aria-describedby="basic-addon3"
                    value="{{ isset($post) ? $post->github_url : '' }}">
            </div>
        </div>

        <label for="basic-url">Playstore URL</label>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://playstore.com/applink/</span>
                </div>
                <input type="text" class="form-control" name="playstore_url" id="playstore_url"
                    aria-describedby="basic-addon3" value="{{ isset($post) ? $post->playstore_url : '' }}">
            </div>
        </div>

        <label for="basic-url">Appstore URL</label>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://appstore.com/applink/</span>
                </div>
                <input type="text" class="form-control" name="appstore_url" id="appstore_url"
                    aria-describedby="basic-addon3" value="{{ isset($post) ? $post->appstore_url : '' }}">
            </div>
        </div>


        <label for="basic-url">Website URL</label>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://websitename.com</span>
                </div>
                <input type="text" class="form-control" name="web_url" id="web_url" aria-describedby="basic-addon3"
                    value="{{ isset($post) ? $post->web_url : '' }}">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                {{ isset($post) ? 'Update Post' : 'Add Post' }}
            </button>
        </div>
        </form>

    </div>
    </div>


@endsection

@section('scripts')
    <!-- include summernote /js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })
        $(document).ready(function() {
            $('.tags-selector').select2();
            $('#summernote').summernote({
                placeholder: 'Content goes here...',
                height: 200,
                dialogsInBody: true,
                callbacks: {
                    onInit: function() {
                        $('body > .note-popover').hide();
                    }
                },
            });

        })
    </script>
@endsection
