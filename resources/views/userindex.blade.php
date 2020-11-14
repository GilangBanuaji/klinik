@extends('layouts.main')

@section('content')
    <h1>Data User
        <a class="btn btn-primary pull-right" role="button" href="{{ route('addUser') }}">
            <i class="fa fa-user-plus" style="margin-right: 5px;"></i>
            Tambah User
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
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role == '1' ? 'Super Admin' : ($user->role == '2' ? 'Petugas' : 'Dokter') }}</td>
                                <td>
                                    <a href="{{ route('editUser', ['id' => $user->id]) }}" class="btn btn-sm btn-info {{ $user->role == Auth::user()->role ? "disabled" : "" }}">
                                        <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                    </a>
                                    <form onsubmit="return confirm('Hapus User ini?')" class="d-inline" action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
    
                                        <button class="btn btn-danger btn-sm" style="margin-left: 5px;" type="submit" {{ $user->role == Auth::user()->role ? "disabled" : "" }}>
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

@section('js')
    <script>
        $(document).ready(function (){
            $('table').DataTable();
        });
    </script>
@endsection