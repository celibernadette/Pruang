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

                <div class="card-header pb-0">
                    Peminjaman Ruang Saya

                    <div style="float: right">
                        <a href="{{url('/main/peminjaman-saya/add')}}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 500px">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>Nama Ruang</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Approver</th>
                                <th>Tgl Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($datas))
                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{ $data->master_ruang->ruang_nama }}</td>
                                        <td>{{ $data->master_ruang->ruang_lokasi }}</td>
                                        <td>{{ strtoupper($data->jadruang_status) }}</td>
                                        <td>
                                            <ul>
                                                @if(!empty($data->master_ruang->master_ruang_approvers))
                                                    @foreach($data->master_ruang->master_ruang_approvers as $approver)
                                                        <li>{{$approver->sys_user->email}}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>{{ $data->jadruang_created_at?->isoFormat('LLLL') }}</td>
                                        <td>
                                            @if($data->jadruang_status == 'menunggu')
                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            @endif
                                        </td>
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
