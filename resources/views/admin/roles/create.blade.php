@extends('admin.dashboard.app')

@section('content')
<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
        <a href="{{route('admin.roles.index')}}">
            <button type="button" class="btn-sm btn-primary float-right"><i class="fa fa-reply"></i> Back</button>
        </a>
      <div class="card-header">
        <h4 class="card-title">Create Role</h4>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('admin.roles.store')}}" method="POST">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="role">Name</label>
            <input type="text" name="name" class="form-control" id="role" placeholder="Enter Role">
            </div>
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Permissions</h4>
                </div>
                <div class="card-body">
                    <div class="form-group clearfix">
                        @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            <input name="permissions[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$permission->id}}">
                            <label class="form-check-label" for="inlineCheckbox1">{{$permission->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Role</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection

