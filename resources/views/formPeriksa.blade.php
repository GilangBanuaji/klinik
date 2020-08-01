@extends('layouts.main')

@section('content')
    <div class="card border rounded-0" style="margin-top: 20px;">
            <div class="card-body">
                <div class="container" style="padding-top: 31px;">
                    <div><a class="btn btn-primary btn-lg pull-right" role="button" data-toggle="modal" href="#">Riwayat</a></div>
                    <h1 class="text-center">Form Periksa</h1>
                </div>
                <div class="container">
                    <div>
                        <form>
                            <div class="form-group">
                                <div>
                                    <div class="form-row" style="margin-bottom: 5px;">
                                        <div class="col"><span>Nama Pasien :&nbsp;</span><span>{{ $periksa->pasiens->fullname }}</span></div>
                                        <div class="col"><span>Tanggal Berobat :&nbsp;</span><span>{{ $periksa->created_at }}</span></div>
                                        <div class="col"><span>Umur :&nbsp;</span><span>{{ $periksa->umur }} Tahun</span></div>
                                    </div>
                                    <div class="form-row" style="margin-bottom: 5px;">
                                        <div class="col"><span>Tekanan Darah :&nbsp;</span><span>{{ $periksa->tekanan_darah }}mm</span></div>
                                        <div class="col"><span>Tekanan Nadi:&nbsp;</span><span>{{ $periksa->nadi }}/menit</span></div>
                                        <div class="col"><span>Respirasi Rate :&nbsp;</span><span>{{ $periksa->respirasi_rate }}</span></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col"><span>Suhu :&nbsp;</span><span>{{ $periksa->suhu }}C</span></div>
                                        <div class="col"><span>Tinggi Badan :&nbsp;</span><span>{{ $periksa->tinggi_badan }}cm</span></div>
                                        <div class="col"><span>Berat Badan :&nbsp;</span><span>{{ $periksa->berat_badan }}kg</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="POST" action="{{ route('periksaUpdate', ['id' => $periksa->id]) }}">
                    <div class="container">
                        <div>
                            @csrf
                            <div class="form-group">
                                <div>
                                    <div class="form-row">
                                        <div class="col"><span>Subjektif dan Objektif :&nbsp;</span><textarea class="form-control" name="sub_and_obj">{{ $periksa->sub_and_obj }}</textarea></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="form-row">
                                        <div class="col"><span>Diagnosa :&nbsp;</span><textarea class="form-control" name="diagnosa">{{ $periksa->diagnosa }}</textarea></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="form-row">
                                        <div class="col"><span>Terapi :&nbsp;</span><textarea class="form-control" name="terapi">{{ $periksa->terapi }}</textarea></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a href="{{ route('periksaPasien') }}" class="btn btn-secondary pull-right">Back</a>
                    </div>
                </form>
            </div>
        </div>
@endsection