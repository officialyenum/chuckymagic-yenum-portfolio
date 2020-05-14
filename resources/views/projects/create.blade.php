@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>
                {{ isset($project) ?'Edit Project':'Create Project' }}
            </h1>
        </div>
        <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($project) ? route('projects.update',$project->id) : route('projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($project))
                    @method('PUT')
                @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title : ''}}">
            </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if(isset($post))
                                @if($category->id == $post->category_id)
                                    selected
                                @endif
                            @endif
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_categories">Sub Categories</label>
                    <select name="sub_categories[]" id="sub_categories" class="form-control tags-selector" multiple>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                @if (isset($project))
                                    @if ($project->hasSubCategory($subCategory->id))
                                        selected
                                    @endif
                                @endif
                                >
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : ''}}">
            </div>
            @if (isset($post))
                <div class="form-group">
                <img src="{{ asset($project->image)}}" alt="image" width="100%">
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
                <label for="tags">Framework</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @if (isset($project))
                                @if ($project->hasTag($tag->id))
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

            @if ($languages->count() > 0)
            <div class="form-group">
                <label for="languages">Programming Languages</label>
                <select name="languages[]" id="languages" class="form-control tags-selector" multiple>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}"
                            @if (isset($project))
                                @if ($project->hasLanguage($language->id))
                                    selected
                                @endif
                            @endif
                            >
                            {{ $language->name }}
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
                    <input type="text" class="form-control" name="github_url" id="github_url" aria-describedby="basic-addon3">
                </div>
            </div>

            <label for="basic-url">Playstore URL</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://playstore.com/applink/</span>
                    </div>
                    <input type="text" class="form-control" name="playstore_url" id="playstore_url"  aria-describedby="basic-addon3">
                </div>
            </div>

            <label for="basic-url">Appstore URL</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://appstore.com/applink/</span>
                    </div>
                    <input type="text" class="form-control" name="appstore_url" id="appstore_url"  aria-describedby="basic-addon3">
                </div>
            </div>


            <label for="basic-url">Website URL</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://websitename.com</span>
                    </div>
                    <input type="text" class="form-control" name="web_url" id="web_url"  aria-describedby="basic-addon3">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($project) ? 'Update Project' : 'Add Project' }}
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })
        // Add the following code if you want the name of the file appear on select


        $(document).ready(function() {
            $('.tags-selector').select2();
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        })
    </script>

@endsection

@section('css')
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
