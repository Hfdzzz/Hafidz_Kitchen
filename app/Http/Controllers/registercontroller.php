<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use App\Models\dataUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\registercontroller;


class registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registerMakanan = makanan::orderBy('id')->get();

        //$item = makanan::orderBy('id')->get();

        return view('home', compact('registerMakanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file_path' => 'required',
        ]);


        $registerMakanan = [
        'nama_makanan' => $request->input('nama_makanan'),
        'deskripsi_singkat' => $request->input('deskripsi_singkat'),
        'deskripsi' => $request->input('deskripsi'),
        'resep' => $request->input('resep'),
        'file_path' => $request->input('file_path'),
    ];

        
        

       

        $data = makanan::create($registerMakanan);

        if($request->hasFile('file_path')){
            $request->file('file_path')->move(public_path().'/img', $request->file('file_path')->getClientOriginalName());
            $data->file_path = $request->file('file_path')->getClientOriginalName();

        }

      

        return redirect('/')->with('success','Data berhasil dikirim');

    }

    public function registerUser(Request $request){
        $registerUser =[
            'username' => $request->input('username'),
            'confirmPassword' =>$request->input('confirmPassword'),
            'password' => $request->input('password'),
        ];

        if($registerUser['confirmPassword'] == $registerUser['password']){

            dataUser::create($registerUser);

            return redirect('/Login')->with('success', 'Pendaftaran berhasil, Silahkan login');

        }else{
            return redirect()->back()->with('error', 'Password Not Match');
        }

        
    }

    public function loginUser(Request $request){
        $loginUser = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        $data = dataUser::where('username', $request->input('username'))->first();

        if(!$data){
            return redirect()->back()->with('error', 'Username tidak di temukan');
        }else{



        if($loginUser['password'] == $data['password'] ){

            //auth()->login($data);

            return redirect('/')->with('success', 'Login Berhasil');

        }else{
            return redirect()->back()->with('error', 'Password salah');
        }

    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $informationFood = makanan::where('id', $id)->first();

        return view('information', compact('informationFood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
