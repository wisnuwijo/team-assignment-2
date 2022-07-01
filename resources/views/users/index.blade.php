@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengguna</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                    @if (Auth::user()->role == "admin")
                        <a href="{{ url('/users/add') }}" class="btn btn-sm btn-primary" style="margin-bottom: 20px;">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">TTL</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Akses</th>
                                    @if (Auth::user()->role == "admin")
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($users as $u)
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->place_of_birth }}, {{ $u->date_of_birth }}</td>
                                        <td>{{ $u->gender == "male" ? "Laki-laki" : "Perempuan" }}</td>
                                        <td>{{ $u->role }}</td>
                                        @if (Auth::user()->role == "admin")
                                            <td>
                                                <a href="{{ url('users',$u->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                                <a href="{{ url('users/delete',$u->id) }}" onclick="return confirm('Yakin akan menghapus akun dengan email {{ $u->email }}?');" class="btn btn-sm btn-outline-danger">Hapus</a>
                                            </td>
                                        @endif
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
