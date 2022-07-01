@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produk</div>

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
                        <a href="{{ url('/products/add') }}" class="btn btn-sm btn-primary" style="margin-bottom: 20px;">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga beli</th>
                                    <th scope="col">Harga jual</th>
                                    @if (Auth::user()->role == "admin")
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($products as $u)
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->picture}}</td>
                                        <td>{{ $u->description}}</td>
                                        <td>{{ $u->purchase_price}}</td>
                                        <td>{{ $u->selling_price}}</td>
                                        @if (Auth::user()->role == "admin")
                                            <td>
                                                <a href="{{ url('products',$u->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                                <a href="{{ url('products/delete',$u->id) }}" onclick="return confirm('Yakin akan menghapus produk dengan nama{{ $u->name}}?');" class="btn btn-sm btn-outline-danger">Hapus</a>
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
