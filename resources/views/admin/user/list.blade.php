@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
         @if (session('alert'))
            <div class="alert alert-success">{{ session('alert') }}</div>
        @endif
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $u )
                <tr class="odd gradeX" align="center" id="row">
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->role->name}}</td>
                    <td>
                       {{$u->avatar}}
                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$u->id}}" onclick="return window.confirm('Are you sure?');" id="delete"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/update/{{$u->id}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#delete').onclick(function(event) {
                $.get("admin/user/delete/getAjax", function(data){
                    $('#row').html(data);
                });
            });
        });
    </script>
@endsection
