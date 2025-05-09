@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Received Messages Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Received Messages Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Received Messages Section</h4>
                            <div class="card-header-action">
                            </div>
                        </div>

                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

     <script>
        $(document).on('change', '.contact_status', function() {
            const checkbox = $(this);
            const id = checkbox.data('id');
            const status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('admin.contact.toggle', ':id') }}'.replace(':id', id),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // ✅ Reloads the page after successful toggle
                    } else {
                        toastr.error('Failed to update status');
                    }
                },
                error: function() {
                    toastr.error('An error occurred');
                }
            });
        });
    </script>
@endpush
