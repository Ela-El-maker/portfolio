@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Personal Development Projects Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Personal Development Projects Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Personal Project</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.personal-growth.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" cols="30" rows="10" style="height: 200px" class="form-control"></textarea>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">From Date</label>

                                    <div class="col-sm-12 col-md-7">
                                        <div class="input-group input-daterange">

                                            <input type="text" class="form-control" name="startDate" value="">
                                        </div>
                                    </div>
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Due Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <br>
                                        <div class="input-group input-daterange">

                                            <input type="text" class="form-control" name="dueDate" value="">

                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">

                                            <option>Select</option>
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Create Project</button>
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
