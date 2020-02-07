@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Your Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md- col-form-label text-md-right"></label>

                            <div class="col-md-4">
                                <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md- offset-md-">
                                <button type="submit" class="btn-sm btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">Name Of Skills</label>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill)
                                    <tr>
                                    <td>{{$skill->name}}</td>
                                    <td>
                                    <form action="{{route('skills.destroy',$skill->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
