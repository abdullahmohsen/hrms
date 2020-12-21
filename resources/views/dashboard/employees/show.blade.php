@extends('layouts.admin.dashboard.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('employees.index') }}"> Employees</a></li>
        <li class="active">Show</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if ($employee->avatar)
                <img src="{{ $employee->avatar_path }}" class="profile-user-img img-responsive img-circle" alt="Employee profile">
              @endif

              <h3 class="profile-username text-center">{{ $employee->first_name }} {{ $employee->middle_name }}
                {{ $employee->last_name }}
              </h3>

              <p class="text-muted text-center">{{ $employee->position->title }}</p>

              <ul class="list-group list-group-unbordered">
                @if ($employee_supervisor)
                  <li class="list-group-item">
                    <b>Line Manager</b> <a href="{{ route('employees.show', $employee_supervisor->id) }}"
                      class="pull-right">{{ $employee_supervisor->first_name }}
                      {{ $employee_supervisor->middle_name }} {{ $employee_supervisor->last_name }}</a>
                  </li>
                @endif
                <li class="list-group-item">
                  <b>Nationality</b> <a class="pull-right">{{ $employee->nationality }}</a>
                </li>
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right">{{ $employee->gender }}</a>
                </li>
                <li class="list-group-item">
                  <b>Basic Salary</b> <a class="pull-right">{{ $employee->basic_salary }} L.E</a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right">{{ $employee->mobile }}</a>
                </li>
                <li class="list-group-item">
                  <b>Joining Data</b> <a class="pull-right">{{ $employee->joining_date }}</a>
                </li>
                <li class="list-group-item">
                  <b>Date OF Birth</b> <a class="pull-right">{{ $employee->date_of_birth }}</a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right">{{ $employee->age }}</a>
                </li>
              </ul>
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
                <b>Send Message</b>
              </button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
              <p class="text-muted">
                {{ $employee->education }}.
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted">{{ $employee->street }}, {{ $employee->city }}</p>

              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">{{ $employee->email }}</p>

              <hr>


              <strong><i class="fa fa-credit-card margin-r-5"></i> Passport Number</strong>
              <p class="text-muted">{{ $employee->passport_number }}</p>

              <hr>


              <strong><i class="fa  fa-space-shuttle margin-r-5"></i> Military Service</strong>
              <p class="text-muted">{{ $employee->military_service }}</p>

              <hr>


              <strong><i class="fa  fa-mars margin-r-5"></i> Marital Status</strong>
              <p class="text-muted">{{ $employee->marital_status }}</p>

              @if ($employee->resume)
                <hr>
                <strong><i class="fa fa-file-pdf-o margin-r-5"></i> Resume</strong>
                {{--  <img src="{{ $employee->resume_path }}" style="width: 100px;" class="" alt="Employee resume">  --}}
                <br>
                <a href="{{ $employee->resume_path }}">Preview the CV</a>

              @endif

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {{-- الحضور --}}
              <li class="active"><a href="#attendance" data-toggle="tab">Attendance</a></li>
              {{-- الأجازاة --}}
              <li><a href="#vacations" data-toggle="tab">Vacations</a></li>
              {{-- السلف --}}
              <li><a href="#cash-advances" data-toggle="tab">Cash Advances</a></li>
              {{-- التقيم --}}
              <li><a href="#evaluations" data-toggle="tab">Evaluations</a></li>
              {{-- الخوصومات --}}
              <li><a href="#deductions" data-toggle="tab">Deductions</a></li>
              {{-- المكافئات --}}
              <li><a href="#awards" data-toggle="tab">Awards</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="attendance">
                <!-- Post -->

                <!-- /.post -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="vacations">
                <!-- The timeline -->

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="cash-advances">

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="evaluations">

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="deductions">

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="awards">

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
