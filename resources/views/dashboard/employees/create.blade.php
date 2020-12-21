@extends('layouts.admin.dashboard.app')

@section('content')

  <div class="content-wrapper">

    <section class="content-header">

      <h1>Add Employee</h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('employees.index') }}"> Employees</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <section class="content">

      {{-- @include('partials._errors') --}}

      <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Employee Information</h3>
          </div><!-- end of box header -->
          <div class="box-body">
            <div class="form-group col-md-4">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
              @error('first_name')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label>Middle Name</label>
              <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
              @error('middle_name')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
              @error('last_name')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              @error('password')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label>Password Confirmation</label>
              <input type="password" name="password_confirmation" class="form-control">
              @error('password_confirmation')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-12">
              <label>Education</label>
              <textarea name="education" class="form-control" cols="10" rows="5">{{ old('education') }}</textarea>
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
                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
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
                  value="{{ old('date_of_birth') }}">
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
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Nationality</label>
              <input type="text" name="nationality" class="form-control" value="{{ old('nationality') }}">
              @error('nationality')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Passport Number</label>
              <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number') }}">
              @error('passport_number')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Marital Status</label>
              <input type="text" name="marital_status" class="form-control" value="{{ old('marital_status') }}">
              @error('marital_status')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Military Service</label>
              <input type="text" name="military_service" class="form-control" value="{{ old('military_service') }}">
              @error('military_service')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Resume</label>
              <input type="file" value="{{ old('resume') }}" name="resume" class="form-control">
              @error('resume')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label>Avatar</label>
              <input type="file" name="avatar" value="{{ old('avatar') }}" class="form-control image">
              @error('avatar')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


          </div><!-- end of box body -->
        </div>
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Employee Address</h3>
          </div>
          <div class="box-body">

            <div class="form-group">
              <label>Country</label>
              <select class="selectpicker countrypicker form-control select2" name="country" style="width: 100%;"
                id="country" data-flag="true">
              </select>
              <input type="text" style="margin-top: 2px" class="form-control" name="country" id="country_id" disabled
                value="{{ old('country') }}">
              @error('country')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" value="{{ old('city') }}">
              @error('city')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Street</label>
              <textarea name="street" class="form-control" cols="10" rows="5">{{ old('street') }}</textarea>
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
                    <option selected disabled>Select the employee position</option>
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                      {{ $position->title }}
                    </option>
                  @endforeach
                </select>
              @else
                <div class="pt-2">
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
              @if ($employee_supervisors)
                <select class="selectpicker form-control select2" name="supervisor_employee_id" style="width: 100%;">
                    <option selected disabled>Select the employee supervisior</option>
                    @foreach ($employee_supervisors as $employee_supervisor)
                    <option value="{{ $employee_supervisor->id }}" {{ old('supervisor_employee_id') == $employee_supervisor->id ? 'selected' : '' }}>
                      {{ $employee_supervisor->first_name }}
                    </option>
                  @endforeach
                </select>
              @else
                <div class="pt-2">
                  There is no employees in our database
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
              <input type="text" name="basic_salary" class="form-control" value="{{ old('basic_salary') }}">
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
                  value="{{ old('joining_date') }}">
              </div>
              @error('joining_date')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <!-- /.input group -->
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
            </div>

          </div>
      </form><!-- end of form -->

  </div><!-- end of box -->

  </section><!-- end of content -->

  </div><!-- end of content wrapper -->

@endsection

@section('scripts')

  <script>
    //$(function () {

    //Datemask dd/mm/yyyy
    //$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    //$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    //$('[data-mask]').inputmask()

    $('.countrypicker').countrypicker();

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //})

    var country = document.getElementById("country")
    var countryHidden = document.getElementById('country_id')
    //console.log(country)

    var countryValue;
    country.addEventListener("change", function(e) {
      countryValue = e.currentTarget.value
      sessionStorage.setItem("countryValue", countryValue)
      //console.log(countryValue)
      countryHidden.value = countryValue
      //console.log(countryHidden.value)

      $('#country').find('option').each(function(i, e) {
        if ($(e).val() == localStorage.getItem("countryValue")) {
          $('#country').prop('selectedIndex', i);
        }
      });
    })

  </script>

@endsection
