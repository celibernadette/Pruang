@extends('layouts.layout_main')

@section('title', 'Jadwal Ruang')

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

                <div class="card-header pb-0">
                    Jadwal Ruangan
                </div>
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 500px">
                    <div class="table-responsive p-0">
                        <table class="table align-items-left mb-0">
                            <thead>
                            <tr>
                                <th>Nama Ruang</th>
                                <th>Lokasi</th>
                                <th>Nama Pengguna</th>
                                <th>Keterangan</th>
                                <th>Tgl Pemakaian</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($datas))
                                @foreach($datas as $data)
                                    <tr>
                                            @if($data->jadruang_status == 'setuju')
                                            <td>{{ $data->ruang_nama }}</td>
                                            <td>{{ $data->ruang_lokasi }}</td>
                                            <td>{{ $data->user_email }}</td>
                                            <td>{{ $data->jadruang_keterangan }}</td>
                                            <td>{{ $data->jadruang_tanggal_mulai }}
                                                s/d {{$data->jadruang_tanggal_selesai}} </td>
                                                <td>{{ strtoupper($data->jadruang_status) }}</td>
                                            @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

