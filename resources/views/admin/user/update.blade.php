 @extends('admin.layout.index')
 @section('content')  
    <div class="row">
        <div class="col-lg-12">
             <h1 class="page-header">User
                <small>{{$user->name}}</small>
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
        @endif
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['url' => 'admin/user/update/'.$user->id, 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $user->name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', $user->email,['class' => 'form-control', 'placeholder' => 'Please Enter email', 'readonly'])}}
                </div>
                <div class="form-group">  
                    <input type="checkbox" id="changePassword" name="changePassword">
                   <!--  {{Form::checkbox('changePassword', '', 0,['id' => 'changePassword'])}} -->
                    {{Form::label('password', 'Change Password')}}
                    {{Form::password('password', ['class' => 'form-control password', 'placeholder' => 'Please Enter password', 'disabled' => '1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('password', 'Password Again')}}
                    {{Form::password('passwordAgain', ['class' => 'form-control password', 'placeholder' => 'Please Enter passwordAgain', 'disabled' => '1'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role') }}
                    {{ Form::select('role_id', $role, $user->role_id,['class' => 'form-control']) }}
    
                </div>
                <div class="form-group">
                    {{Form::label('avartar', 'Avatar')}}
                    <img style="margin-top: 30px;margin-bottom: 30px;" width='200px' height="200px" src="upload/avatar/{{$user->avatar}}">
                    {{Form::file('avatar', ['class' => 'form-control'])}}
                </div>
                {{Form::submit('Update User', ['class' => 'btn btn-default'])}}
                <button type="reset" class="btn btn-default">Reset</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#changePassword').change(function(event) {
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection

