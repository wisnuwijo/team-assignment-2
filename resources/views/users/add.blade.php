@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pengguna</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ url('/users/store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nameInput">Nama</label>
                            <input type="text" class="form-control" id="nameInput" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email</label>
                            <input type="email" class="form-control" id="emailInput" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="placeOfBirthInput">Tempat Lahir</label>
                            <input type="text" class="form-control" id="placeOfBirthInput" name="place_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="dateOfBirthInput">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dateOfBirthInput" name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="genderInput">Jenis Kelamin</label>
                            <select class="form-control" id="genderInput" name="gender" required>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="accessInput">Akses</label>
                            <select class="form-control" id="accessInput" name="role" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">
                                Kata Sandi
                            </label>
                            <input type="password" name="password" class="form-control" id="passwordInput" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmationInput">
                                Konfirmasi Sandi
                            </label>
                            <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmationInput" required>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary"/>
                        <a href="{{ url('/users') }}" class="btn btn-sm btn-outline-info">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
