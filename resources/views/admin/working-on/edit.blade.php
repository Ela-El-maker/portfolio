@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Working On List Career Development Projects Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Working On List Career Development Projects Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Working On List Career Development Projects</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.working-on.update',$editWorks->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" value="{{ $editWorks->name }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" cols="30" rows="10" style="height: 200px" class="form-control">{{ $editWorks->description }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Finish Date</label>

                                     <div class="col-sm-12 col-md-7">
                                     <div class="input-group input-daterange">

                                        <input type="text" class="form-control" name="dueDate" value="{{ $editWorks->dueDate }}">
                                    </div>
                                    </div>


                                </div>

                                  <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option value="draft"
                                                {{ old('status', $editWorks->status) == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                            <option value="published"
                                                {{ old('status', $editWorks->status) == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update Project</button>
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
