@extends('layouts.layout_main')

@section('title', 'Setting Ruang')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session("success"))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </div>
        @endif
        
        <form method="post" >
            @csrf
            <div class="form-group">
                <label>Nama Ruang</label>
                <input type="text" class="form-control" name="ruang_nama" value="{{$data->ruang_nama }}">
            </div>
            <div class="form-group">
                <label>Nama Lokasi</label>
                <input type="text" class="form-control" name="ruang_lokasi" value="{{$data->ruang_lokasi }}">
            </div>
            </div>
       
                    </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection