@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pengguna</div>

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

                    <form method="post" action="{{ url('/users', $user->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="nameInput">Nama</label>
                            <input type="text" class="form-control" id="nameInput" value="{{ $user->name }}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email</label>
                            <input type="email" class="form-control" id="emailInput" value="{{ $user->email }}" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="placeOfBirthInput">Tempat Lahir</label>
                            <input type="text" class="form-control" id="placeOfBirthInput" value="{{ $user->place_of_birth }}" name="place_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="dateOfBirthInput">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dateOfBirthInput" value="{{ $user->date_of_birth }}" name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="genderInput">Jenis Kelamin</label>
                            <select class="form-control" id="genderInput" name="gender" required>
                                <option value="male" {{ $user->gender == "male" ? "selected" : "" }}>Laki-laki</option>
                                <option value="female" {{ $user->gender == "female" ? "selected" : "" }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="accessInput">Akses</label>
                            <select class="form-control" id="accessInput" name="role" required>
                                <option value="admin" {{ $user->role == "admin" ? "selected" : "" }}>Admin</option>
                                <option value="user" {{ $user->role == "user" ? "selected" : "" }}>User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">
                                Kata Sandi
                                <strong>(Kosongkan apabila tidak ingin diubah)</strong>
                            </label>
                            <input type="password" name="password" class="form-control" id="passwordInput">
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmationInput">
                                Konfirmasi Sandi
                                <strong>(Kosongkan apabila tidak ingin diubah)</strong>
                            </label>
                            <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmationInput">
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
