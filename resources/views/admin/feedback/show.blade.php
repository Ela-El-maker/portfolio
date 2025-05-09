@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.feedback.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Received feedbacks Section</h1>

        </div>

        <div class="section-body">
            <h2 class="section-title">Received feedbacks Section</h2>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Received Feedbacks</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Message Sent</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="created-at"
                                            value="{{ $feedback->created_at->diffForHumans() }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Sent On : </label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="created-at"
                                            value="{{ $feedback->created_at->format('Y-m-d H:i:s') }}">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id=""
                                            value="{{ $feedback->name }}">
                                    </div>
                                </div>




                

                                 <div class="mb-3 row">
                                    <label for="" class="col-sm-2 col-form-label">Company</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id=""
                                            value="{{ $feedback->company }}">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="" class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" readonly class="form-control-plaintext" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px">{{ $feedback->description }}</textarea>

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
