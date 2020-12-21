@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Departments</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Departments</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">departments <small>{{ $departments->total() }}</small></h3>

                    <form action="{{ route('departments.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('departments.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($departments->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>No. of departments</th>
                                <th>Title</th>
                                <th>Related Positions</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($departments as $index=>$department)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $department->title }}</td>
                                    <td><a href="{{ route('positions.index', ['department_id' => $department->id]) }}" class="btn btn-info btn-sm">Related Position</a></td>
                                    <td>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{--  pagination  --}}
                        {{ $departments->appends(request()->query())->links() }}

                    @else

                        <h2>No Data Found</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
