@extends('layouts.main')

@section('content')
    @php
        if ($periksa->status == 1 && Auth::user()->role != '1') {
            $status = 'disabled';
        } else {
            $status = '';
        }
    @endphp
    <div class="card border rounded-0" style="margin-top: 20px;">
        @if(session('failed'))
            <div class="alert alert-danger" style="margin:15px;">
                {{ session('failed') }}
            </div>
        @endif
        @if(session('status'))
            <div class="alert alert-success" style="margin:15px;">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <div class="container" style="padding-top: 31px; padding-bottom: 30px;">
                <div><a style=" margin:5px;" class="btn btn-primary btn-lg pull-right" target="_blank" href="{{ route('riwayatPasien', ['id' => $periksa->pasien_id]) }}">Riwayat</a></div>
                <div><a style="margin:5px;" class="btn btn-secondary btn-lg {{ $status }} editbutton pull-right" data-id="{{ $periksa->id }}" role="button" data-toggle="modal" href="#" style="margin-bottom: 10px; padding-left:10px; padding-right:10px">Edit</a></div>
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
                                    <div class="col"><span>Tekanan Darah :&nbsp;</span><span>{{ $periksa->tekanan_darah }} mmHg</span></div>
                                    <div class="col"><span>Tekanan Nadi:&nbsp;</span><span>{{ $periksa->nadi }} / Menit</span></div>
                                    <div class="col"><span>Respirasi Rate :&nbsp;</span><span>{{ $periksa->respirasi_rate }} / Menit</span></div>
                                </div>
                                <div class="form-row">
                                    <div class="col"><span>Suhu :&nbsp;</span><span>{{ $periksa->suhu }} C</span></div>
                                    <div class="col"><span>Tinggi Badan :&nbsp;</span><span>{{ $periksa->tinggi_badan }} CM</span></div>
                                    <div class="col"><span>Berat Badan :&nbsp;</span><span>{{ $periksa->berat_badan }} Kg</span></div>
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
                                    <div class="col"><span>Subjektif dan Objektif :&nbsp;</span><textarea class="form-control {{ $status }}" name="sub_and_obj" {{ $status }}>{{ $periksa->sub_and_obj }}</textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="form-row">
                                    <div class="col"><span>Diagnosa :&nbsp;</span><textarea class="form-control {{ $status }}" name="diagnosa" {{ $status }}>{{ $periksa->diagnosa }}</textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="form-row">
                                    <div class="col"><span>Terapi :&nbsp;</span><textarea class="form-control {{ $status }}" name="terapi" {{ $status }}>{{ $periksa->terapi }}</textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <button class="btn btn-primary {{ $status }}" type="submit" {{ $status }}>Save</button>
                    <a href="{{ route('periksaPasien') }}" class="btn btn-secondary pull-right">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on("click",".editbutton",function(){
            let data_id = $(this).attr('data-id');
            $.get('/periksa/getData/'+data_id,function(data){
                $("#periksa_id").val(data.id);
                $("#tekanan_darah").val(data.tekanan_darah);
                $("#respirasi_rate").val(data.respirasi_rate);
                $("#tinggi_badan").val(data.tinggi_badan);
                $("#nadi").val(data.nadi);
                $("#suhu").val(data.suhu);
                $("#berat_badan").val(data.berat_badan);
                $("#editModal").modal('show');                
            });
        });
    </script>
@endsection

@section('modal')
    <div class="modal fade text-left modal-center" role="dialog" tabindex="-1" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('periksaEdit') }}">
                    <input type="hidden" name="periksa_id" id="periksa_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tekanan Darah</label>
                                    <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" placeholder="Tekanan Darah" required/>
                                </div>
                                <div class="form-group">
                                    <label>Respirasi Rate</label>
                                    <input type="text" class="form-control" id="respirasi_rate" name="respirasi_rate" placeholder="Respirasi Rate" required/>
                                </div>
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city_name">Nadi</label>
                                    <input type="text" class="form-control" id="nadi" name="nadi" placeholder="Nadi" required/>
                                </div>
                                <div class="form-group">
                                    <label for="city_name">Suhu</label>
                                    <input type="text" class="form-control" id="suhu" name="suhu" placeholder="suhu" required/>
                                </div>
                                <div class="form-group">
                                    <label for="city_name">Berat Badan</label>
                                    <input type="text" class="form-control" id="berat_badan" name="berat_badan" placeholder="Berat Badan" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection