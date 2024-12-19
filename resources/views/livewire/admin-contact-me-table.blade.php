<div>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('admin.contacts') }}">
                    <h3 class="text-primary">Contact Me</h3>
                </a>

                <button type="button" class="opendModal btn btn-primary m-2 btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#messageModal">
                    Send To All <i class="fa fa-envelope"></i>
                </button>
                <!-- Search Bar -->
                {{-- <div class="ms-3">
                    <input type="text" class="form-control" placeholder="Search..." wire:model.live.rebounce.100ms="searchme">
                </div> --}}

            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($contacts->isNotEmpty())
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <th scope="row">{{ $contacts->firstItem() + $index }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    <span class="text-danger" data-bs-toggle="tooltip"
                                        title="{{ $contact->message ?? 'No message available' }}">
                                        <i class="bi bi-chat-square-dots-fill"></i>
                                    </span>
                                </td>
                                <td>
                                    <!-- Message Delete -->
                                    <button type="button" class="btn btn-outline-danger m-2 btn-sm"
                                        onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.deleteContact', $contact->id) }}');">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Message Button -->
                                    <button type="button" class="opendModal btn btn-outline-primary m-2 btn-sm"
                                        data-bs-toggle="modal"
                                        data-user-id="{{ $contact->id }}"
                                        data-bs-target="#messageModal">
                                        <i class="fa fa-envelope"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">-- No Contacts Available --</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>


    <!-- Email Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Send Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.sendEmail')}}">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="user_id" id="user_id" >
                            <input type="hidden" name="type" value="contact_me" >

                            <label for="templateSelect" class="form-label">Email Template</label>
                            <select class="form-control bg-dark" name="template_id" id="templateSelect">
                                <option value="">--Select Template--</option>
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                                @endforeach
                            </select>
                            @error('selectedTemplateId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('[data-bs-toggle="tooltip"]').css('cursor', 'pointer');

            $(document).on('click','.opendModal', function() {
                const userId = $(this).data('user-id');
                $('#user_id').val(userId);
            });
        });
    </script>
@endpush
