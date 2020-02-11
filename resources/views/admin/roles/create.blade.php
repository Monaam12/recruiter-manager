@extends('admin.app')

@section('content')
<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Create Role</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('admin.roles.store')}}" method="POST" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="role">Name</label>
            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Enter Role">
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Permissions</label>
                <div class="select2-purple">
                  <select name="permissions[]" class="select2" multiple="multiple" data-placeholder="Select a Permission" data-dropdown-css-class="select2-purple" style="width: 100%;" >
                    @foreach ($permissions as $permission)
                        <option value="{{$permission->id}}">
                            {{$permission->name}}
                        </option>
                    @endforeach
                  </select>
                </div>
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
