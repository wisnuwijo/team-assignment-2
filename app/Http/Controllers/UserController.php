<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            "users" => User::all()
        ];

        return view('users.index', $data);
    }

    public function edit($id)
    {
        if (Auth::user()->role == "user") return abort(403);

        $user = User::find($id);
        if (!isset($user)) return abort(404);
        $data = [
            "user" => $user
        ];

        return view('users.edit', $data);
    }

    public function update(Request $req, $id)
    {
        $currentUser = User::find($id);
        $currentEmail = null;
        if (isset($currentUser)) $currentEmail = $currentUser->email;
        if ($currentEmail != $req['email']) {
            $countEmail = User::where("email", $req['email'])->count();
            if ($countEmail > 0) {
                return redirect()->back()->with([
                    "error" => "Mohon gunakan email lain, ". $req['email'] ." sudah digunakan akun lain"
                ]);
            }
        }

        unset($req['_token']);
        if ($req['password'] == "") {
            unset($req['password']);
            unset($req['passwordConfirmation']);
        } else {
            if ($req['password'] != $req['passwordConfirmation']) {
                return redirect()->back()->with([
                    "error" => "Kata sandi tidak sama"
                ]);
            }

            $req['password'] = bcrypt($req['password']);
            unset($req['passwordConfirmation']);
        }
        
        User::where("id",$id)->update($req->all());

        return redirect('/users')->with([
            "success" => "Data berhasil diubah"
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/users')->with([
            "success" => "Pengguna berhasil dihapus"
        ]);
    }

    public function add()
    {
        if (Auth::user()->role == "user") return abort(403);
        return view('users.add');
    }

    public function store(Request $req)
    {
        $checkEmail = User::where('email', $req['email'])->first();
        if (isset($checkEmail)) {
            return redirect()->back()->with([
                "error" => "Mohon gunakan email lain, ". $req['email'] ." sudah digunakan akun lain"
            ]);
        }

        unset($req['_token']);
        if ($req['password'] == "") {
            unset($req['password']);
            unset($req['passwordConfirmation']);
        } else {
            if ($req['password'] != $req['passwordConfirmation']) {
                return redirect()->back()->with([
                    "error" => "Kata sandi tidak sama"
                ]);
            }

            $req['password'] = bcrypt($req['password']);
            unset($req['passwordConfirmation']);
        }

        User::insert($req->all());
        return redirect('/users')->with([
            "success" => "Pengguna berhasil ditambahkan"
        ]);
    }
}
