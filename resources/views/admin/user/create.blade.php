@extends('admin.layout.index')
@section('content')    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
         @if (count($errors)>0)
                       
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{ $err }}<br>
                @endforeach
            </div>
                       
        @endif
        @if (session('alert'))
            <div class="alert alert-success">{{ session('alert') }}</div>
        @elseif (session('alertErr'))
            <div class="alert alert-danger">{{ session('alertErr') }}</div>
        @endif
        <div class="col-lg-7" style="padding-bottom:120px">
           {!! Form::open(['url' => 'admin/user/create', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('name', 'Enter Name')}}
                    {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Please Enter name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Please Enter email'])}}
                </div>
                 <div class="form-group">  
                    {{Form::label('password', 'Enter Password')}}
                    {{Form::password('password', ['class' => 'form-control password', 'placeholder' => 'Please Enter password'])}}
                </div>
                <div class="form-group">
                    {{Form::label('password', 'Password Again')}}
                    {{Form::password('passwordAgain', ['class' => 'form-control password', 'placeholder' => 'Please Enter passwordAgain'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role') }}
                    {{ Form::select('role_id', $role, '',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{Form::label('avartar', 'Avatar')}}
                    {{Form::file('avatar', ['class' => 'form-control'])}}
                </div>
                {{Form::submit('Add User', ['class' => 'btn btn-default'])}}
                <button type="reset" class="btn btn-default">Reset</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection