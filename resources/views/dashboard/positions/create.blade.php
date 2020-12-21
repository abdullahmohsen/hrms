@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Positions</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('positions.index') }}"> Positions</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Add Position</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    {{-- @include('partials._errors') --}}

                    <form action="{{ route('positions.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            @if (count($departments))
                                <select class="selectpicker form-control select2" name="department_id" style="width: 100%;">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"  {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <div class="pt-2">
                                    There is no positions in our database, <a href="{{ route('departments.create') }}">Create
                                        new</a>
                                </div>
                            @endif
                            @error('department_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

