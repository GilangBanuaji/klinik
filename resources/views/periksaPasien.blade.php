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
                            <th>No.</th>
                            <th>No. RM</th>
                            <th>Nama Pasien</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            @if (Auth::user()->role !='2')
                                <th width="15%">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach ($rawats as $rawat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rawat->pasiens->no_rm }}</td>
                                <td>{{ $rawat->pasiens->fullname }}</td>
                                <td>{{ $rawat->pasiens->ttl }}</td>
                                <td>{{ $rawat->pasiens->alamat }}</td>
                                <td>{{ $rawat->status == 1 ? 'Telah diperiksa oleh ' . $rawat->dokter->full_name : 'Belum diperiksa' }}</td>
                                @if (Auth::user()->role !='2')
                                    <td>
                                    
                                        <a href="{{ route('doPeriksaPasien', ['id' => $rawat->id]) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" style="font-size: 15px;"></i> Periksa
                                        </a>
                                    </td>
                                @endif
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