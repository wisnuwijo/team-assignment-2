<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $data = [
            "products" => Product::all()
        ];

        return view('products.index', $data);
    }

    public function edit($id)
    {
        if (Auth::user()->role == "user") return abort(403);

        $product = Product::find($id);
        if (!isset($product)) return abort(404);
        $data = [
            "product" => $product
        ];

        return view('products.edit', $data);
    }

    public function update(Request $req, $id)
    {
        unset($req['_token']);
       
        Product::where("id",$id)->update($req->all());

        return redirect('/products')->with([
            "success" => "Data berhasil diubah"
        ]);
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('/products')->with([
            "success" => "Produk berhasil dihapus"
        ]);
    }

    public function add()
    {
        if (Auth::user()->role == "user") return abort(403);

        return view('products.add');
    }

    public function store(Request $req)
    {
        unset($req['_token']);
        Product::insert($req->all());
        return redirect('/products')->with([
            "success" => "Produk berhasil ditambahkan"
        ]);
    }
}
