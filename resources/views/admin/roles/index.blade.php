@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">
            <i class="nav-icon fas fa-users"></i>
             Role Management
        </h1>
      </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="role" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Role</th>
          <th>Permission</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{implode(',', $role->permissions()->pluck('name')->toArray())}}</td>
                <td>
                   <a class="float-left" href="{{route('admin.roles.edit',$role->id)}}">
                        <i class="fas fa-edit"></i>
                   </a>

                <form action="{{route('admin.roles.destroy',$role->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="float-right">
                        <i class="fas fa-trash">
                    </i></button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
