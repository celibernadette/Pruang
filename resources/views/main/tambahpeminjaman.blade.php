@extends('layouts.layout_main')

@section('title', 'Peminjaman Saya')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 p-4">
                @if (session("success"))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="card-body px-0 pt-0 pb-2" style="min-height: 500px">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="jadruang_ruang_id">Ruang</label>
                            <select name="jadruang_ruang_id" id="jadruang_ruang_id" class="form-control">
                                @foreach($dataRuang as $ruang)
                                    <option value="{{$ruang->ruang_id}}">{{ $ruang->ruang_nama }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jadruang_tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="jadruang_tanggal_mulai" id="jadruang_tanggal_mulai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" id="jam_mulai">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jadruang_tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="jadruang_tanggal_selesai" id="jadruang_tanggal_selesai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control" id="jam_selesai">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Keperluan</label>
                            <textarea name="jadruang_keterangan" id="jadruang_keterangan"
                                      class="form-control"
                                      placeholder="Tuliskan kepentingan peminjaman ruang...">{{old('jadruang_keterangan')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
