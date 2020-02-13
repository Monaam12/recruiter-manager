@extends('admin.dashboard.app')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{$profile->image}}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">
                {{$profile->first_name}} {{$profile->last_name}}
              </h3>

              <p class="text-muted text-center">{{$profile->job}}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Phone</strong>

              <p class="text-muted">
                {{$profile->phone}}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
               <p class="text-muted">{{$profile->address}}</p>
              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Age</strong>

              <p class="text-muted">
                <span class="tag tag-danger">{{$profile->age}}</span>
              </p>

              <hr>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About</a></a></li>
                <li class="nav-item"><a class="nav-link" href="#skills" data-toggle="tab">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience" data-toggle="tab">Experiences</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects" data-toggle="tab">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#training" data-toggle="tab">Training</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <div class="active tab-pane" id="about">
                      <div class="card text-left">
                        <div class="card-body">
                       {{$profile->about}}
                        </div>
                      </div>
                  </div>

                <div class="active tab-pane" id="skills">
                    @foreach ($profile->Skills() as $skill)
                      <div class="card text-left">
                        <div class="card-body">
                        <h4 class="card-title">{{$skill->name}}</h4>
                        </div>
                      </div>
                    @endforeach
                  </div>

            @foreach ($profile->Experience() as $experience)
                <div class="tab-pane" id="experience">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        {{$experience->end}}
                      </span>
                    </div>
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header">{{$experience->company}}</h3>
                        <h3 class="timeline-header">{{$experience->job}}</h3>
                        <div class="timeline-body">{{$experience->description}}</div>
                      </div>
                    </div>

                    <div class="time-label">
                      <span class="bg-success">
                        {{$experience->start}}
                      </span>
                    </div>
                  </div>
                </div>
            @endforeach

            @foreach ($profile->projects() as $project)
                <div class="tab-pane" id="projects">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        {{$project->end}}
                      </span>
                    </div>
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header">{{$project->name}}</h3>
                        <div class="timeline-body">{{$project->description}}</div>
                      </div>
                    </div>

                    <div class="time-label">
                      <span class="bg-success">
                        {{$project->start}}
                      </span>
                    </div>
                  </div>
                </div>
            @endforeach

            @foreach ($profile->Trainings() as $training)
                <div class="tab-pane" id="training">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        {{$training->end}}
                      </span>
                    </div>
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header">{{$training->school}}</h3>
                        <h3 class="timeline-header">{{$training->name}}</h3>
                        <div class="timeline-body">{{$training->description}}</div>
                      </div>
                    </div>

                    <div class="time-label">
                      <span class="bg-success">
                        {{$training->start}}
                      </span>
                    </div>
                  </div>
                </div>
            @endforeach

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
