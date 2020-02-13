@extends('admin.dashboard.app')

@section('content')
<div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch">

        @foreach ($profiles as $profile)

        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                {{implode(',',$profile->user()->pluck('name')->toArray())}}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{$profile->job}}</b></h2>
                  <p class="text-muted text-sm"><b>About: </b>
                    {{-- {!!strlen($profile->about) > 20 ? substr($profile->about,0,22) : $profile->about!!} --}}
                    {{ Str::limit($profile->about,30,'...')}}

                </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$profile->address}}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$profile->phone}}</li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{$profile->image}}"" alt="" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a class="btn-sm btn-primary" href="{{route('admin.profile.show',$profile->id)}}"
                  <i class="fas fa-user"></i> View Profile
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
         {{$profiles->links()}}
        </ul>
      </nav>
    </div>
    <!-- /.card-footer -->
  </div>
@endsection
