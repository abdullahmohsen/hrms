@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Edit Employee</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('employees.index') }}"> Employees</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Edit</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    {{--  @include('partials._errors')  --}}

                    <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group col-md-4">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}">
                            @error('first_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" value="{{ $employee->middle_name }}">
                            @error('middle_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}">
                            @error('last_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                        <label>Education</label>
                        <textarea name="education" class="form-control" cols="10" rows="5">{{ $employee->education }}</textarea>
                        @error('education')
                            <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group col-md-4">
              <label>Mobile</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" class="form-control" name="mobile" value="{{ $employee->mobile }}">
              </div>
              @error('mobile')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <!-- /.input group -->
            </div>

            <div class="form-group col-md-4">
              <label>Date Of Birth</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date_of_birth" class="form-control pull-right" id="datepicker"
                  value="{{ $employee->date_of_birth }}">
              </div>
              @error('date_of_birth')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <!-- /.input group -->
            </div>



            <div class="form-group col-md-4">
              <label>Gender</label>
              <select class="selectpicker form-control select2" name="gender" style="width: 100%;">
                <option value="male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Nationality</label>
              <input type="text" name="nationality" class="form-control" value="{{ $employee->nationality }}">
              @error('nationality')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Passport Number</label>
              <input type="text" name="passport_number" class="form-control" value="{{ $employee->passport_number }}">
              @error('passport_number')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Marital Status</label>
              <input type="text" name="marital_status" class="form-control" value="{{ $employee->marital_status }}">
              @error('marital_status')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Military Service</label>
              <input type="text" name="military_service" class="form-control" value="{{ $employee->military_service }}">
              @error('military_service')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Avatar</label>
              <input type="file" name="avatar" value="{{ $employee->avatar }}" class="form-control image">
              @error('avatar')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Resume</label>
              <input type="file" value="{{ $employee->resume }}" name="resume" class="form-control">
              @error('resume')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-12">
                <img src="{{ $employee->avatar_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>


          </div><!-- end of box body -->
        </div>
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Employee Address</h3>
          </div>
          <div class="box-body">

            <div class="form-group col-md-12">
              <label>Country</label>
              <select class="selectpicker countrypicker form-control select2" name="country" style="width: 100%;"
                id="country" data-flag="true">
              </select>
              <input type="text" style="margin-top: 2px" class="form-control" name="country" id="country_id" disabled
                value="{{ $employee->country }}">
              @error('country')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="form-group col-md-12">
              <label>City</label>
              <input type="text" name="city" class="form-control" value="{{ $employee->city }}">
              @error('city')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-12">
              <label>Street</label>
              <textarea name="street" class="form-control" cols="10" rows="5">{{ $employee->street }}</textarea>
              @error('street')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div><!-- end of box body -->

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Employee Position</h3>
          </div><!-- end of box header -->
          <div class="box-body">

            <div class="form-group col-md-6">
              <label>Position</label>
              @if (count($positions))
                <select class="selectpicker form-control select2" name="position_id" style="width: 100%;">
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                      {{ $position->title }}
                    </option>
                  @endforeach
                </select>
              @else
                <div style="padding-bottom: 14px;">
                  There is no positions in our database, <a href="{{ route('positions.create') }}">Create
                    new</a>
                </div>
              @endif
              @error('position_id')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Employee Supervisior</label>
              @if (count($employee_supervisors) > 1)
                <select class="selectpicker form-control select2" name="supervisor_employee_id" style="width: 100%;">
                    @foreach ($employee_supervisors as $employee_supervisor)
                    <option value="{{ $employee_supervisor->id }}" {{ $employee->supervisor_employee_id == $employee_supervisor->id ? 'selected' : '' }}>
                      {{ $employee_supervisor->first_name }}
                    </option>
                  @endforeach
                </select>
              @else
                <div style="padding-bottom: 14px;">
                  There is only one employee in our database, <a href="{{ route('employees.create') }}">Create
                    new</a>
                </div>
              @endif
              @error('supervisor_employee_id')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>




            <div class="form-group col-md-6">
              <label>Basic Salary</label>
              <input type="text" name="basic_salary" class="form-control" value="{{ $employee->basic_salary }}">
              @error('basic_salary')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="form-group col-md-6">
              <label>Joining Date</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="joining_date" placeholder="mm/dd/yyyy"
                  value="{{ $employee->joining_date }}">
              </div>
              @error('joining_date')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <!-- /.input group -->
            </div>

                        
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
