@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Update Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Footer Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.footer-info.update',1)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="info" id="" cols="30" rows="10" class="form-control" style="height: 100px">{!!$footerInfo?->info!!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Copy right</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="copyright" class="form-control"
                                            value="{{$footerInfo?->copyright}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Powered By</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="powered_by" class="form-control"
                                            value="{{$footerInfo?->powered_by}}">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update Section</button>
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
