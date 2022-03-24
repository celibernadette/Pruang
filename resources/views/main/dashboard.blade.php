@extends('layouts.layout_main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="height: 500px">
                <div class="card-header pb-0">
                    <h6><marquee> Halo Selamat Datang {{ auth()->user()->user_email }}</marquee></h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    
<div class="container">

    <div class="panel panel-primary">

      <div class="panel-heading"><h5>Upload Foto Profile</h5></div>

      <div class="panel-body">

        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('image') }}">

        @endif
    

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6">

                    <input type="file" name="image" class="form-control">

                </div>

                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>

     

            </div>

        </form>
    

      </div>

    </div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>


@endsection