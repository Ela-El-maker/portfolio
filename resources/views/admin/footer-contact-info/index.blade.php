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
                            <h4>Update Footer Info Contact Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.footer-info-contact.update',1)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="address" class="form-control"
                                            value="{{$infoContact->address}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{$infoContact->phone}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" name="email" class="form-control"
                                            value="{{$infoContact->email}}">
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
