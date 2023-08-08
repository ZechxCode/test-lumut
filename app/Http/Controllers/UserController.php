<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('akun.akun', compact('users'));
    }

    public function login()
    {
        return view("login");
    }

    public function storeLogin(LoginRequest $loginRequest)
    {
        $valreq = $loginRequest->validated();

        // dd($valreq);

        $user = User::where('username', $valreq['username'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        if (Hash::check($valreq['password'], $user->password)) {
            Auth::login($user);
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Wrong Password');
        }
    }

    public function logout()
    {
        $user = auth()->user();

        Auth::logout($user);

        return redirect("login");
    }



    public function editPassword(string $id)
    {
        $editData = User::where('id', $id)->first();
        return view('akun.edit_password', compact('editData'));
    }

    public function updatePassword(Request $request, string $id)
    {
        $user = User::find($id);

        if (Hash::check($request->password_lama, $user->password)) {
            $user->password = Hash::make($request->password_baru);
            $user->save();

            return redirect('akun')->with('success', 'Password berhasil diubah');
        } else {
            return redirect('akun')->with('error', 'Password lama yang dimasukkan tidak cocok');
        }
    }


    public function edit(string $id)
    {
        $editData = User::where('id', $id)->first();
        return view('akun.edit_akun', compact('editData'));
    }

    public function update(Request $request, string $id)
    {
        $ubah['username'] = $request->username;
        $ubah['name'] = $request->name;
        $ubah['role'] = $request->role;

        User::find($id)->update($ubah);
        return redirect('akun')->with('success', 'Data berhasil dirubah');
    }

    public function create()
    {
        return  view('akun/tambah_akun');
    }

    public function store(registerRequest $registerRequest)
    {
        $validator = Validator::make($registerRequest->all(), $registerRequest->rules(), $registerRequest->messages());

        if ($validator->fails()) {
            return redirect('akun')
                ->withErrors($validator)
                ->withInput();
        }
        $valreq = $registerRequest->validated();
        if ($valreq) {
            # code...
            $valreq['password'] = Hash::make($valreq['password']);
            User::create($valreq);
            return redirect('akun')->with('success', 'Akun berhasil ditambahkan');
        }
    }


    public function destroy(string $id)
    {
        // $data = Post::where('id', $id)->first();
        // dd($id);
        User::destroy($id);
        return redirect('akun')->with('success', 'Data berhasil dihapus');
    }
}
