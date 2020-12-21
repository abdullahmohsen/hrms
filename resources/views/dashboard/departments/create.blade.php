@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Departements</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('departments.index') }}"> Departments</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Add Department</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    {{-- @include('partials._errors') --}}

                    <form action="{{ route('departments.store') }}" method="post">
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

