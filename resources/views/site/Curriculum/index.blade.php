@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Personal Information</div>

                <div class="card-body">
                    @foreach ($profiles as $profile)
                    <label>image : </label>
                        <div class="col-md-3">
                            <img src="{{$profile->image}}" alt="profile image" width="100px">
                        </div>
                        <label>First Name : </label>
                        <div class="col-md-3">
                            {{$profile->first_name}}
                        </div>
                        <label>Last Name : </label>
                        <div class="col-md-3">
                            {{$profile->last_name}}
                        </div>
                        <label>age : </label>
                        <div class="col-md-3">
                            {{$profile->age}}
                        </div>
                        <label>Address : </label>
                        <div class="col-md-3">
                            {{$profile->address}}
                        </div>
                        <label>Phone : </label>
                        <div class="col-md-3">
                            {{$profile->phone}}
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
</div>
@endsection
