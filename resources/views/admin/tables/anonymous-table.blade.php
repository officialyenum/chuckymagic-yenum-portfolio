
    <div class="card card-header mb-5">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
        </div>
        <div class="card-body">
            @if ($messages->count() > 0)
                <table  id="tagTable" class="display table table-striped table-bordered">
                    <thead>
                        <th scope="row">#</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>
                                    {{ $message->id }}
                                </td>
                                <td>
                                    {{ $message->content }}
                                </td>
                                <td>
                                    @if ($message->published == 0 )
                                        <span class="text-white bg-danger p-1 rounded">Unpublished</span>
                                    @else
                                        <span class="text-white bg-success p-1 rounded">Published</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $message->created_at }}
                                </td>
                                <td>
                                    <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $message->id }})">Delete</button>
                                    <a href="{{ route('anonymous-yellow.edit', $message->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No {{$title}} Messages Yet</h3>
            @endif
        </div>
    </div>
