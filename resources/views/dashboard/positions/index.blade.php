@extends('layouts.admin.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Positions</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Positions</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">positions <small>{{ $positions->total() }}</small></h3>

                    <form action="{{ route('positions.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('positions.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($positions->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>No. of positions</th>
                                <th>Title</th>
                                <th>Related Department</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($positions as $index=>$position)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $position->title }}</td>
                                    <td>{{ $position->department->title }}</td>
                                    <td>
                                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('positions.destroy', $position->id) }}" method="post" style="display: inline-block">
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
                        {{ $positions->appends(request()->query())->links() }}

                    @else

                        <h2>No Data Found</h2>

                    @endif

                </div><!-- end of box body -->
            </div><!-- end of box -->
        </section><!-- end of content -->
    </div><!-- end of content wrapper -->

@endsection
