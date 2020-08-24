@extends('layouts.main')

@section('content')
    <h1>Riwayat Pasien
    </h1>
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
            <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                        <tr>
                            <th>No. RM</th>
                            <th>Tanggal Berobat</th>
                            <th>Tekanan Darah</th>
                            <th>Respirasi Rate</th>
                            <th>Tinggi Badan</th>
                            <th>Nadi</th>
                            <th>Suhu</th>
                            <th>Berat Badan</th>
                            <th>Subjektif dan Objektif</th>
                            <th>Diagnosa</th>
                            <th>Terapi</th>
                            <th>Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach ($pasiens as $pasien)
                            <tr>
                                <td>{{ $pasien->pasiens->no_rm }}</td>
                                <td>{{ $pasien->created_at }}</td>
                                <td>{{ $pasien->tekanan_darah }}</td>
                                <td>{{ $pasien->respirasi_rate }}</td>
                                <td>{{ $pasien->tinggi_badan }}</td>
                                <td>{{ $pasien->nadi }}</td>
                                <td>{{ $pasien->suhu }}</td>
                                <td>{{ $pasien->berat_badan }}</td>
                                <td>{{ $pasien->sub_and_obj }}</td>
                                <td>{{ $pasien->diagnosa }}</td>
                                <td>{{ $pasien->terapi }}</td>
                                <td>{{ $pasien->dokter->full_name }}</td>
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
    </script>
@endsection