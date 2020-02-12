@extends('admin.dashboard.app')

@section('content')
<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit User</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('admin.users.update',$user->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="username">Name</label>
            <input type="text" name="name" class="form-control" id="username" placeholder="Enter Role" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Role" value="{{old('email')}}">
            </div>

            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Role</h4>
                </div>
                <div class="card-body">
                    <div class="form-group clearfix">
                        @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <input name="roles[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$role->id}}">
                            <label class="form-check-label" for="inlineCheckbox1">{{$role->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
              </div>

            <div class="form-group">
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
