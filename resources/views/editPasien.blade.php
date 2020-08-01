@extends('layouts.main')

@section('content')
    <div class="container" style="padding-top: 31px;">
        <h4 class="text-uppercase text-center text-secondary">Form Edit Pasien</h4>
    </div>
    <div class="card" style="margin-left: 50px;margin-right: 50px;">
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
        <div class="card-body" style="background-color: #f4f0f0;">
            <form action="{{ route('updatePasien', $pasien->id) }}"  method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_rm">Nomor Rekam Medis</label>
                            <input type="text" name="no_rm" class="form-control" value="{{ $pasien->no_rm }}" placeholder="Nomor Rekam Medis" required/>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kel">Jenis Kelamin</label>
                            <select name="jenis_kel" id="jenis_kel" class="form-control" required>
                                <option value="P" {{ $pasien->jenis_kel == 'P' ? 'selected' : '' }}>Perempuan</option>
                                <option value="L" {{ $pasien->jenis_kel == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alergi_obat">Alergi Obat</label>
                            <input type="text" name="alergi_obat" class="form-control" value="{{ $pasien->riwayat_alergi_obat }}" placeholder="Alergi Obat" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fullname">Nama Pasien</label>
                            <input type="text" name="fullname" class="form-control" value="{{ $pasien->fullname }}" placeholder="Nama Pasien" required/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $pasien->alamat }}" placeholder="Alamat" required/>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{ $pasien->pekerjaan }}" placeholder="Pekerjaan" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="ttl">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $pasien->tempat_lahir }}" placeholder="Tempat Lahir" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ $pasien->tanggal_lahir }}" name="tanggal_lahir" id="tanggal_lahir"/>
                                        <input type="hidden" name="tanggal_lahir_old" value="{{ $pasien->tanggal_lahir }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Telepon</label>
                            <input type="text" class="form-control" name="no_hp" value="{{ $pasien->no_hp }}" id="no_hp" placeholder="No Telepon" required/>
                        </div>
                        <div class="form-group">
                            <label for="no_bpjs">No BPJS</label>
                            <input type="text" class="form-control" name="no_bpjs" value="{{ $pasien->no_bpjs }}" id="no_bpjs" placeholder="No BPJS" required/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-primary">Simpan</button>
                <a href="{{ route('userIndex') }}" class="btn btn-lg btn-block btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection