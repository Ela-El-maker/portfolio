@extends('admin.layouts.layout')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hello, {{ old('name', $user->name) }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                       
                            <div class="card-header">
                                <h4>Profile Information</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('patch')

                                    <div class="row">
                                        <div class="form-group col-md-6 col-7">
                                            <label>Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                value="{{ old('name', $user->name) }}" required="">
                                            @if ($errors->has('name'))
                                                <code>{{ $errors->first('name') }}</code>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input id="email" name="email" type="email" class="form-control"
                                                value="{{ old('email', $user->email) }}" required="">
                                            @if ($errors->has('email'))
                                                <code>{{ $errors->first('email') }}</code>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>


                            </div>

                        
                    </div>

                    <div class="card">
                        
                            <div class="card-header">
                                <h4>Password Information</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Current Password</label>
                                            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                                            @if ($errors->updatePassword->has('current_password'))
                                                <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                            @endif
                                        </div>

                                        <div class="form-group col-12">
                                            <label>New Password</label>
                                            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                                            @if ($errors->updatePassword->has('password'))
                                                <code>{{ $errors->updatePassword->first('password') }}</code>
                                            @endif
                                        </div>


                                        <div class="form-group col-12">
                                            <label>Confirm Password</label>
                                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                                            @if ($errors->updatePassword->has('password_confirmation'))
                                                <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                            @endif
                                        </div>

                                
                                    </div>


                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>


                            </div>

                        
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
