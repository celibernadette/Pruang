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

                </div>
            </div>
        </div>
    </div>
@endsection
