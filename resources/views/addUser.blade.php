@extends('layouts.main')

@section('content')
    <div class="container" style="padding-top: 31px;">
        <h4 class="text-uppercase text-center text-secondary">Form Tambah User</h4>
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
            <form action="{{ route('saveUser') }}"  method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required/>
                        </div>
                        <div class="form-group">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="" class="form-control" required>
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="2">Staff</option>
                                <option value="3">Dokter</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-primary">Simpan</button>
                <a href="{{ route('userIndex') }}" class="btn btn-lg btn-block btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection