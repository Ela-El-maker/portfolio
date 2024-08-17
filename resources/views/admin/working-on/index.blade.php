@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Working On List Career Development Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Working On List Career Development Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Working On List Career Development Projects</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.working-on.create') }}" class="btn btn-success">Create New <i class="fas fa-plus"></i></a>
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
@endpush