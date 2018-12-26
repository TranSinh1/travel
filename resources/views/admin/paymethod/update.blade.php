 @extends('admin.layout.index')
 @section('content')  
    <div class="row">
        <div class="col-lg-12">
             <h1 class="page-header">Update
                        <small>{{ $paymethod->name }}</small>
            </h1>
        </div>
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
                    <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/paymethod/update/{{ $paymethod->id }}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" ">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ $paymethod->name }}"  />
                </div>
                <button type="submit" class="btn btn-default">Paymethod Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
@endsection
