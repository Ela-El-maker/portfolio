@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Footer Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Footer Help Links Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Footer Help Links Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.footer-help-links.update', $helpLinksEdit->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control"
                                            value="{{$helpLinksEdit->name}}">
                                    </div>
                                </div>
                                
                              
                               
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="url" class="form-control"
                                            value="{{$helpLinksEdit->url}}">
                                    </div>
                                </div>
                                



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview').css({
                'background-image': 'url("")',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        });
    </script>
@endpush
