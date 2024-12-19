<div>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-4 text-primary">Users</h3>

                {{-- <div class="ms-3">
                    <input type="text" class="form-control" placeholder="Search..."
                    wire:model.live.debounce.200ms="searchme">
                </div> --}}
                <button type="button" class="opendModal btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#messageModal">
                    Send To All <i class="fa fa-envelope"></i>
                </button>

                @error('searchme')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isNotEmpty())
                        @foreach ($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $users->firstItem() + $index }}</th>
                                <td>{{ $user->name ?? '--' }}</td>
                                <td>{{ $user->email ?? '--' }}</td>
                                <td class="text-center">

                                    <!-- Message Button -->
                                    <a href="{{ route('admin.chat', $user->id) }}"
                                        class="btn btn-outline-primary m-2 btn-sm">
                                        <i class="fa fa-comments"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <button
                                        onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.delete-user', $user->id) }}');"
                                        type="button" class="btn btn-outline-danger m-2 btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Email Button -->
                                    <button type="button" class="opendModal btn btn-outline-primary m-2 btn-sm"
                                        data-bs-toggle="modal" data-user-id="{{ $user->id }}"
                                        data-bs-target="#messageModal">
                                        <i class="fa fa-envelope"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">-- No Users Available --</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Send Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.sendEmail') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="hidden" name="type" value="user">

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
            $(document).on('click', '.opendModal', function() {
                const userId = $(this).data('user-id');
                $('#user_id').val(userId);
            });
        });
    </script>
@endpush
