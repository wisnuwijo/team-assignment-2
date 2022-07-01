@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Produk</div>
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

                    <form method="post" action="{{ url('/products/store') }}">
                        @CSRF
                        <div class="form-group">
                            <label for="nameInput">Nama</label>
                            <input type="text" class="form-control" id="nameInput" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="pictureInput">Gambar</label>
                            <input type="text" class="form-control" id="pictureInput" name="picture" required>
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Deskripsi</label>
                            <input type="text" class="form-control" id="descriptionInput" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="pPInput">Harga Beli</label>
                            <input type="number" class="form-control" id="pPInput" name="purchase_price" required>
                        </div>
                        <div class="form-group">
                            <label for="sPInput">Harga Jual</label>
                            <input type="number" class="form-control" id="sPInput" name="selling_price" required>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary"/>
                        <a href="{{ url('/products') }}" class="btn btn-sm btn-outline-info">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
