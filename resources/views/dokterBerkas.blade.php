@extends('layouts.main')

@section('content')
    <h1>Menu Periksa
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
                            <th>No. RM</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Riwayat Alergi Obat</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach ($rawats as $rawat)
                            <tr>
                                <td>{{ $rawat->pasiens->no_rm }}</td>
                                <td>{{ $rawat->pasiens->fullname }}</td>
                                <td>{{ $rawat->pasiens->jenis_kel == 'P' ? 'Perempuan' : 'Laki - Laki' }}</td>
                                <td>{{ $rawat->pasiens->alamat }}</td>
                                <td>{{ $rawat->pasiens->riwayat_alergi_obat }}</td>
                                <td>{{ $rawat->pasiens->ttl }}</td>
                                <td>{{ $rawat->pasiens->pekerjaan }}</td>
                                <td>
                                    <a class="btn btn-primary text-center pull-left printSurat" role="button" data-toggle="modal" href="#" style="margin-right: 3px;background-color: rgb(139,206,122);font-size: 16px;line-height: 24px;padding-right: 10px;padding-left: 10px;">Print Surat</a>   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('table').DataTable();
        });

        $(document).on("click",".printSurat",function(){
            $("#printSurat").modal('show');
        });

        $(document).on("change", "#tipe_surat", function(){
            var value = $("#tipe_surat").val();
            let button = '<button class="btn btn-primary pull-right" type="submit" style="background-color: rgb(109,132,200);margin-top: 21px;width: 50%;">Print&nbsp;<i class="la la-paper-plane-o"></i></button>';
            if (value == 1) {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
                let htmlSection = `
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Buta Warna</label>
                                <select name="buta_warna" class="form-control">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Sebagian">Sebagian</option>
                                    <option value="Tidak Diperiksa">Tidak Diperiksa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pernyataan Sehat</label>
                                <select name="pernyataan_sehat" class="form-control">
                                    <option value="Sehat">Sehat</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                `;
                $("#sectionInput").append(htmlSection);
                $(".btnPrint").append(button);
            } else if (value == 2) {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
                $(".btnPrint").append(button);
            } else if (value == 3) {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
                $(".btnPrint").append(button);
            } else if (value == 4) {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
                $(".btnPrint").append(button);
            } else if (value == 5) {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
                $(".btnPrint").append(button);
            } else {
                $("#sectionInput").empty();
                $(".btnPrint").empty();
            }
        });
    </script>
@endsection

@section('modal')
    <div class="modal fade text-left modal-center" role="dialog" tabindex="-1" id="printSurat">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('periksaEdit') }}">
                    <input type="hidden" name="periksa_id" id="periksa_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Print Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipe Surat</label>
                                    <select id="tipe_surat" class="form-control">
                                        <option value="" disabled selected>Pilih Tipe Surat</option>
                                        <option value="1">Sehat</option>
                                        <option value="2">Sakit</option>
                                        <option value="3">Rujukan</option>
                                        <option value="4">Status</option>
                                        <option value="5">Setuju</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="sectionInput" id="sectionInput"></div>
                    </div>
                    <div class="modal-footer btnPrint"></div>
                </form>
            </div>
        </div>
    </div>
@endsection