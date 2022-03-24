@extends('layouts.layout_main')

@section('title', 'Data Approval')

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
                    Approval Ruangan
                </div>
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 500px">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Status</th>
                                <th>Nama Ruang</th>
                                <th>Lokasi</th>
                                <th>Nama Peminjam</th>
                                <th>Keterangan</th>
                                <th>Tgl Peminjaman</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($datas))
                                @foreach($datas as $data)
                                    <tr>
                                        <td>
                                            @if($data->jadruang_status == 'menunggu')
                                                <button class="btn btn-primary btn-sm" onclick="confirmApprove({{$data->jadruang_id}}, 'setuju')">Approve</button>
                                                <button class="btn btn-danger btn-sm" onclick="confirmApprove({{$data->jadruang_id}}, 'tolak')">Decline</button>
                                            @endif
                                        </td>
                                        <td>{{ strtoupper($data->jadruang_status) }}</td>
                                        <td>{{ $data->ruang_nama }}</td>
                                        <td>{{ $data->ruang_lokasi }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->jadruang_keterangan }}</td>
                                        <td>{{ $data->jadruang_tanggal_mulai }}
                                            s/d {{$data->jadruang_tanggal_selesai}} </td>

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

@push('foot')
    <script>
        function confirmApprove(jadId, status) {
            const ok = confirm("Anda yakin ?");
            if (ok) {
                location.href = `{{url('/main/approval-ruangan/approve')}}?jad_id=${jadId}&status=${status}`
            }
        }
    </script>
@endpush
