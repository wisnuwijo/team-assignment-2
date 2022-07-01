@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Utama</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button onclick="location.href='{{ url('/users') }}';" class="btn btn-dark btn-sq-responsive">Pengguna</button>
                    <button onclick="location.href='{{ url('/products') }}';"  class="btn btn-dark btn-sq-responsive">Produk</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
