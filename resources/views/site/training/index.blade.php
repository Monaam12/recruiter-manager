@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Your Profile - Training</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('training.store') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school" class="col-md-2 col-form-label text-md-right">School</label>

                            <div class="col-md-8">
                                <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}"  autofocus>

                                @error('school')
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
                                    Add Training
                                </button>
                            </div>
                        </div>

                    </form>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">Training</label>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>School</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainings as $training)
                                    <tr>
                                        <td>{{$training->name}}</td>
                                        <td>{{$training->school}}</td>
                                        <td>{{$training->description}}</td>
                                        <td>{{$training->start}}</td>
                                        <td>{{$training->end}}</td>
                                        <td>
                                        <form action="{{route('training.destroy',$training->id)}}" method="post">
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
