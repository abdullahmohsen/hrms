@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Employees</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Employees</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">employees <small>{{ $employees->total() }}</small></h3>

                    <form action="{{ route('employees.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($employees->count())

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>No. of employees</th>
                                <th>Full name</th>
                                <th>email</th>
                                <th>action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($employees as $index=>$employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }}<a></td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success btn-sm"><i class="fa fa-file-code-o"></i> Show</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE ')
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form><!-- end of form -->
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{--  pagination  --}}
                        {{ $employees->appends(request()->query())->links() }}

                    @else

                        <h2>No Data Found</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <!-- Delete -->
    {{--  <div class="modal fade" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="employee_delete.php">
                        <input type="hidden" class="empid" name="id">
                        <div class="text-center">
                            <p>DELETE EMPLOYEE</p>
                            <h2 class="bold del_employee_name"></h2>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  --}}


@endsection

