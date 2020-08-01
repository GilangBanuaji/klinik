@extends('layouts.main')

@section('content')
    <h1>Data Pasien
        <a class="btn btn-primary pull-right" role="button" href="{{ route('addPasien') }}">
            <i class="fa fa-user-plus" style="margin-right: 5px;"></i>
            Tambah Pasien
        </a>
    </h1>
    <div class="card">
        <div class="card-body">
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
            <div class="col-md-12">
            <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                        <tr>
                            <th>No.</th>
                            <th>No. RM</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>No. BPJS</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Riwayat Alergi Obat</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach ($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pasien->no_rm }}</td>
                                <td>{{ $pasien->fullname }}</td>
                                <td>{{ $pasien->jenis_kel == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                <td>{{ $pasien->no_bpjs }}</td>
                                <td>{{ $pasien->no_hp }}</td>
                                <td>{{ $pasien->alamat }}</td>
                                <td>{{ $pasien->riwayat_alergi_obat }}</td>
                                <td>{{ $pasien->ttl }}</td>
                                <td>{{ $pasien->pekerjaan }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary daftarbutton" data-id="{{ $pasien->id }}">
                                        <i class="fa fa-edit" style="font-size: 15px;"></i>
                                    </a>

                                    <a href="{{ route('editPasien', ['id' => $pasien->id]) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                    </a>
                                    <form onsubmit="return confirm('Hapus Pasien ini?')" class="d-inline" action="{{ route('deletePasien', ['id' => $pasien->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
    
                                        <button class="btn btn-danger btn-sm" style="margin-left: 5px;" type="submit">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form method="POST" action="{{ route('daftarPasien') }}">
             <input type="hidden" name="pasien_id" id="pasien_id">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
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
                            <input type="text" class="form-control" name="tekanan_darah" placeholder="Tekanan Darah" required/>
                        </div>
                        <div class="form-group">
                            <label>Respirasi Rate</label>
                            <input type="text" class="form-control" name="respirasi_rate" placeholder="Respirasi Rate" required/>
                        </div>
                        <div class="form-group">
                            <label>Tinggi Badan</label>
                            <input type="text" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city_name">Nadi</label>
                            <input type="text" class="form-control" name="nadi" placeholder="Nadi" required/>
                        </div>
                        <div class="form-group">
                            <label for="city_name">Suhu</label>
                            <input type="text" class="form-control" name="suhu" placeholder="suhu" required/>
                        </div>
                        <div class="form-group">
                            <label for="city_name">Berat Badan</label>
                            <input type="text" class="form-control" name="berat_badan" placeholder="Berat Badan" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('table').DataTable();
        });
        $(document).on("click",".daftarbutton",function(){
            let data_id = $(this).attr('data-id');
            $("#pasien_id").val(data_id);
            $("#daftarModal").modal('show');
        });
    </script>
@endsection