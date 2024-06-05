@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Skill</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Create Skill Item</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create  Skill Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.skill-item.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Skill Program</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="skill" class="form-control"
                                            value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percentage</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="percent" class="form-control"
                                            value="">
                                    </div>
                                </div>

                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Create Skill</button>
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
