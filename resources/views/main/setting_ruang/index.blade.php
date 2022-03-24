@extends('layouts.layout_main')

@section('title', 'Setting Ruang')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    Setting Ruangan

                    <div style="float: right">
                        <a href="{{url("$url/create")}}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if (session("message"))
                        <div class="alert alert-primary" style="color: white">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>Nama Ruang</th>
                                <th>Lokasi</th>
                                <th>Approver</th>
                                <th>Tgl Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($datas))
                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{ $data->ruang_nama }}</td>
                                        <td>{{ $data->ruang_lokasi }}</td>
                                        <td>
                                            <ul>
                                                @if(!empty($data->master_ruang_approvers))
                                                    @foreach($data->master_ruang_approvers as $approver)
                                                        <li>{{$approver->sys_user->email}}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>{{ $data->ruang_created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <a href="{{url("$url/edit/$data->ruang_id")}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{url("$url/delete/$data->ruang_id")}}" onclick="return confirm('anda yakin ?')" class="btn btn-danger btn-sm">Delete</a>
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
