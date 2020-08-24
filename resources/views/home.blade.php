@extends('layouts.main')

@section('content')
@if (Auth::user()->role == '1')
    <hr class="star-dark mb-5">
    <div class="card-group">
        <div class="card border" style="max-height: 500px; max-width: 500px;">
            <img width="500px" src="assets/img/user.jpg">
            <div class="card-body">
                <h4 class="text-center card-title">USER</h4>
                <a class="btn btn-primary" role="button" href="{{ route('userIndex') }}">
                    <i class="fa fa-user" style="margin-right: 5px;"></i>Data User
                </a>
            </div>
        </div>
    </div>
@else
    @if (Auth::user()->role =='2')
        <hr class="star-dark mb-5">
        <div class="card-group">
            <div class="card border rounded-0"><img class="card-img-top w-100 d-block" src="assets/img/Pasien.jpg">
                <div class="card-body">
                    <h4 class="text-center card-title">PASIEN</h4><a class="btn btn-primary" role="button" href="{{ route('pasienIndex') }}"><i class="fa fa-user" style="margin-right: 5px;"></i>Data Pasien</a></div>
            </div>
            <div class="card border rounded-0" style="margin-left: 7px;"><img class="card-img-top w-100 d-block" src="assets/img/print.jpg">
                <div class="card-body">
                    <h4 class="card-title">CETAK BERKAS</h4><a class="btn btn-primary" role="button" href="A-rekamMedis.html" style="margin-left: 0%;"><i class="fa fa-print" style="margin-right: 5px;"></i>Rekam Medis</a></div>
            </div>
        </div>
    @else
        <hr class="star-dark mb-5">
            <div class="card-group">
            <div class="card border rounded-0"><img class="card-img-top w-100 d-block" src="assets/img/RawatJalan.jpg">
                <div class="card-body">
                    <h4 class="text-center card-title">Rawat Jalan</h4>
                    <a class="btn btn-primary" role="button" href="{{ route('pasienIndex') }}">
                        <i class="fa fa-user" style="margin-right: 5px;"></i>Data Pasien
                    </a>
                    <a class="btn btn-primary" role="button" href="{{ route('periksaPasien') }}" style="margin-left: 5px;">
                        <i class="fa fa-user" style="margin-right: 5px;"></i>Periksa
                    </a>
                </div>
            </div>
            <div class="card border rounded-0" style="margin-left: 7px;"><img class="card-img-top w-100 d-block" src="assets/img/print.jpg">
                <div class="card-body">
                    <h4 class="card-title">CETAK BERKAS</h4><a class="btn btn-primary" role="button" href="{{ route('dokterBerkas') }}"><i class="fa fa-user" style="margin-right: 5px;"></i>Cetak Surat</a></div>
            </div>
        </div>
    @endif
@endif
@endsection
