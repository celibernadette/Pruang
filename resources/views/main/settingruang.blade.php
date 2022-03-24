@extends('layouts.layout_main')

@section('title', 'Setting Ruang')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    Setting Ruangan
                </div>
                <div class="card-body px-0 pt-0 pb-2">
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
                                                        <li>{{$approver->sys_user->user_email}}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>{{ $data->ruang_created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
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
