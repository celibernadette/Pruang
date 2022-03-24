@extends('layouts.layout_main')

@section('title', 'Tambah Ruang')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    Tambah Ruangan
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">
                        @if (session("success"))
                            <div class="alert alert-primary">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </div>
                        @endif
                        <div class="col-md-12" style="padding: 10px 40px 0 40px">
                            <form method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ruang_nama">Nama Ruang</label>
                                        <input type="text" class="form-control" id="ruang_nama"
                                               placeholder="Tulis nama ruang..." name="ruang_nama">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ruang_lokasi">Lokasi Ruang</label>
                                        <input type="text" class="form-control" id="ruang_lokasi"
                                               placeholder="Tulis lokasi ruang..." name="ruang_lokasi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="approver">Pemberi Izin Lab</label>
                                    @foreach($dataKepalaLab as $kalab)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck"
                                                   name="list_approver[]" value="{{$kalab->user_id}}">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ $kalab->email }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
