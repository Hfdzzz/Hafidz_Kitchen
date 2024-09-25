<?php

namespace App\Http\Controllers;

use App\Mail\purchaseMail;
use App\Models\makanan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
   


    public function index(Request $request)
    {
        // Mail::to("hafidzaulia28@gmail.com")->send(new purchaseMail());
        // return '<h1>sukses</h1>';

        // $validated = $request->validate([
        //     'nama_makanan' => 'required|exists:daftar_makanan,id',
        //     'jumlahPesanan' => 'required|integer|min:1',
            
        // ]);

        $jumlahPesanan = $request->input('jumlahPesanan');

        $user = auth()->user();

        $daftar_makanan = makanan::where('nama_makanan', $request->input('nama_makanan'))->first();


        Mail::to($user->email)->send(new purchaseMail($user, $daftar_makanan, $jumlahPesanan));


       return redirect()->back()->with('success', 'Berhasil memesan');
    }
}
