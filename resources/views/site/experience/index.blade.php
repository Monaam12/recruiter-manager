@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Your Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('experience.store') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="company" class="col-md-2 col-form-label text-md-right">Company</label>

                            <div class="col-md-3">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}"  autofocus>

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="job" class="col-md-2 col-form-label text-md-right">Job</label>

                            <div class="col-md-3">
                                <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}" autofocus>

                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-8">
                                <input id="description" type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-md-2 col-form-label text-md-right">Start</label>

                            <div class="col-md-3">
                                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}"  autofocus>

                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="end" class="col-md-2 col-form-label text-md-right">To</label>

                            <div class="col-md-3">
                                <input id="end" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" autofocus>

                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 offset-md-2">
                                <button type="submit" class="btn-sm btn-primary">
                                    Add Experience
                                </button>
                            </div>
                        </div>

                    </form>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">Experiences</label>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Job</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($experiences as $experience)
                                    <tr>
                                        <td>{{$experience->company}}</td>
                                        <td>{{$experience->job}}</td>
                                        <td>{{$experience->description}}</td>
                                        <td>{{$experience->start}}</td>
                                        <td>{{$experience->end}}</td>
                                        <td>
                                        <form action="{{route('experience.destroy',$experience->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-primary">Delete</button>
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
