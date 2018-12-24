@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        @if(session('alert'))
            <div class="alert alert-success">{{session('alert')}}</div>
        @endif
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $r)
                <tr class="odd gradeX" align="center">
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->name }}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/role/delete/{{ $r->id }}" onclick="return window.confirm('Are you sure?');"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/role/update/{{ $r->id }}" >Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
