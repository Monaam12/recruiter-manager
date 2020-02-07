@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Your Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">First Name</label>

                            <div class="col-md-3">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="last_name" class="col-md-2 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-3">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job" class="col-md-2 col-form-label text-md-right">Job</label>

                            <div class="col-md-3">
                                <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}">

                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="age" class="col-md-2 col-form-label text-md-right">Age</label>

                            <div class="col-md-3">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">phone</label>

                            <div class="col-md-3">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="image" class="col-md-2 col-form-label text-md-right">Image</label>

                            <div class="col-md-3">
                                <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-right">Address</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control @error('age') is-invalid @enderror" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           <label for="about" class="col-md-2 col-form-label text-md-right">Cv</label>

                            <div class="col-md-3">
                                <input id="about" type="file" class="form-control" name="about">
                            </div>

                            <label for="driving" class="col-md-2 col-form-label text-md-right">Driving</label>

                             <div class="col-md-3">
                                 <input id="driving" type="file" class="form-control" name="driving">
                             </div>
                         </div>

                         <div class="form-group row">
                            <label for="about" class="col-md-2 col-form-label text-md-right">About You</label>

                             <div class="col-md-8">
                                 <input id="about" type="text" class="form-control" name="about">
                             </div>
                         </div>

                        <div class="form-group">
                            <div class="col-md-3 offset-md-2">
                                <button type="submit" class="btn-sm btn-primary">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
