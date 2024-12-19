@extends('admin.partials.layout')

@section('title', 'AakashAP | Email-Templates')

@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between m-3">
                        <h3 class="text-primary">Email Templates</h3>
                        <a class="btn btn-primary" href="{{ route('admin.add-template') }}">
                            <i class="fa fa-plus me-2"></i>Add Template
                        </a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($templates->isNotEmpty())
                                @foreach ($templates as $template)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $template->title }}</td>
                                        <td>{{ $template->subject }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked_{{ $template->id }}"
                                                    data-template-id="{{ $template->id }}"
                                                    @if ($template->status == 'active') checked @endif>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <!-- View Button -->
                                            <button type="button" class="btn btn-outline-primary m-2 btn-sm view-template"
                                                data-content="{{ $template->content }}">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.edit-template', $template->id) }}"
                                                class="btn btn-outline-primary m-2 btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <button type="button"
                                                onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.delete-template', $template->id) }}');"
                                                class="btn btn-outline-primary m-2 btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">-- No Template Available --</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- Table End -->


    <!-- Modal for Viewing Template -->
    <div class="modal fade text-dark" id="viewTemplateModal" tabindex="-1" aria-labelledby="viewTemplateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Email Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="templateContent">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script>

        $(document).ready(function() {
            $('input[type="checkbox"][role="switch"]').change(function() {
                var templateId = $(this).data('template-id');
                var newStatus = $(this).is(':checked') ? 'active' : 'inactive';

                // Create a FormData object
                var formData = new FormData();
                formData.append('id', templateId);
                formData.append('status', newStatus);
                formData.append('_token', '{{ csrf_token() }}');

                ajaxRequest('{{ route('admin.status-template') }}', formData)
                    .then(response => {

                        if (response.success) {

                            showToast('Success', 'success', response.message);

                        } else {

                            showToast('Error', 'error', response.message || 'An error occurred.');
                        }
                    })
                    .catch(error => {

                        showToast('Error', 'error', error.message || 'An error occurred.');
                    })

            });
            // Set up the modal to show the template details
            $('.view-template').on('click', function() {
                var content = $(this).data('content');
                $('#templateContent').html(content);
                $('#viewTemplateModal').modal('show');
            });
        });
    </script>
@endpush
