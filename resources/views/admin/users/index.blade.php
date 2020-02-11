@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">
            <i class="nav-icon fas fa-users"></i>
             Users Management
        </h1>
      </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="user" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
            <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{implode(',', $user->role()->pluck('name')->toArray())}}</td>
                <td>
                   <a href="{{route('admin.users.edit',$user->id)}}">
                    <i class="fas fa-edit"></i>
                  </a>

                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="float-right">
                        <i class="fas fa-trash">
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
