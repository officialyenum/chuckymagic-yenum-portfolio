<div class="card card-header mb-5">
    <div class="card-header">
        <h3 class="card-title">Contact</h3>
    </div>
    <div class="card-body">
        @if ($contacts->count() > 0)
            <table  id="tagTable" class="display table table-striped table-bordered">
                <thead>
                    <th scope="row">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Project</th>
                    <th>Message</th>
                    <th>Day Sent</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>
                                {{ $contact->id }}
                            </td>
                            <td>
                                {{ $contact->name }}
                            </td>
                            <td>
                                {{ $contact->email }}
                            </td>
                            <td>
                                {{ $contact->project }}
                            </td>
                            <td>
                                {{ $contact->message }}
                            </td>
                            <td>
                                {{ $contact->created_at }}
                            </td>
                            <td>
                                <button class="btn btn-danger float-right ml-1" onclick="handleDelete({{ $contact->id }})">Delete</button>
                                <a href="{{ route('contact.edit', $contact->id)}}"  class="btn btn-primary float-right ml-1">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteContactForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Contact</h5>
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
            <h3 class="text-center">No Contact Info Yet</h3>
        @endif
    </div>
</div>
