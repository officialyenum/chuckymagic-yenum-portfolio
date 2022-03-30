<div class="card card-header mb-5">
    <div class="card-header">
        <h3 class="card-title">{{ $title}} </h3>
    </div>
    <div class="card-body">
        @if ($tags->count() > 0)
            <table  id="tagTable" class="display table table-striped table-bordered">
                <thead>
                    <th scope="row">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->id }}
                            </td>
                            <td>
                                <img src="{{asset($tag->image)}}" alt="category image" width="40px"  height="40px">
                            </td>
                            <td>
                                {{ $tag->title }}
                            </td>
                            <td>
                                {{ $tag->posts->count() }}
                            </td>
                            <td>
                                <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $tag->id }})">Delete</button>
                                <a href="{{ route('tags.edit', $tag->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">No {{$title}} Yet</h3>
        @endif
    </div>
</div>
