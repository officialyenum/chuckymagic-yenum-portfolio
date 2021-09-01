<div class="card card-header mb-5">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    @if ($posts->count() > 0)
        <div class="card-body">
            <table id="userTable" class="display table table-striped table-bordered">
                <thead>
                    <th></th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>User </th>
                    <th>Created At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }} </td>
                            <td><img src="{{ $post->featured_image }}" class="img-fluid" width="35"
                                    alt="post image"></td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ $post->category->title }}
                            </td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-secondary-inverse mr-2">{{ $tag->title }}</span>
                                @endforeach
                            </td>
                            <td>{{ $post->user->username}}</td>
                            <td>
                                {{ $post->created_at->diffforhumans() }}
                            </td>
                            <td>
                                @if ($post->trashed())
                                        <form action="{{route('restore-posts', $post)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"  class="btn btn-primary btn-xs" style="font-size: 10"><i class="fa fa-recycle" aria-hidden="true"></i></button>
                                        </form>
                                        <button class="btn btn-warning btn-xs" style="font-size: 10" onclick="handleDelete({{ $post->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    @else
                                        <a href="{{ route('posts.edit', $post)}}"  class="btn btn-primary btn-xs" style="font-size: 10"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{ route('posts.destroy', $post)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" style="font-size: 10">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
        <h3 class="text-center">No {{ $title }} Yet</h3>
    @endif
    <!-- /.card-body -->
</div>
</div>
