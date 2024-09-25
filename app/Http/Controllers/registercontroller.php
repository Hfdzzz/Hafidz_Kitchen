<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\makanan;
use App\Models\dataUser;
//use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Cloudinary\Transformation\Transformation;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;




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
        'file_path' => 'required|file',
    ]);

    
    $file = $request->file('file_path');

    
    $registerMakanan = [
        'nama_makanan' => $request->input('nama_makanan'),
        'deskripsi_singkat' => $request->input('deskripsi_singkat'),
        'deskripsi' => $request->input('deskripsi'),
        'daftar_harga' => $request->input('daftar_harga'),
    ];

    if ($file) {
      
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        
        $file->move(public_path('img'), $fileName);
        $registerMakanan['file_path'] = $fileName;
    }

    
    Makanan::create($registerMakanan);

    return redirect('/')->with('success', 'Data berhasil dikirim');
}


    public function registerUser(Request $request){

        

        

        $registerUser =[
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'confirmPassword' => $request->input('confirmPassword'),
            'password' => $request->input('password'),
        ];

        $data = User::where('username',$request->input('username'))->first();

        if(empty($data)){

        if($registerUser['confirmPassword'] == $registerUser['password']){

            $registerUser =[
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'email' => $request->input('email'),
            ];

            User::create($registerUser);

            return redirect('/Login')->with('success', 'Pendaftaran berhasil, Silahkan login');

        }else{
            return redirect()->back()->with('error', 'Password Not Match');
        }

    }

    return redirect()->back()->with('error', 'Username telah digunakan pengguna lain, silahkan cari username berbeda');

        
    }

    public function loginUser(Request $request){
        $loginUser = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        


        if (Auth::attempt($loginUser)){
            return redirect('/')->with('success', 'Login Berhasil, Selamat datang ' . Auth::user()->username);
        }else{
            return redirect()->back()->with('error', 'Username / Password salah');
        }



    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'Anda telah logout');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $informationFood = makanan::where('id', $id)->first();
        

        return view('information', compact('informationFood'));

        

        //return view('mail.purchaseMail', compact('informationFood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateForm(string $id)
    {
        $data = makanan::where('id', $id)->first();

        return view('updateMakanan', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = makanan::where('id', $id)->first();

        $data->update(['nama_makanan' => $request->input('nama_makanan')]);
        $data->update(['deskripsi_singkat' => $request->input('deskripsi_singkat')]);
        $data->update(['deskripsi' => $request->input('deskripsi')]);
        $data->update(['daftar_harga' => $request->input('daftar_harga')]);
        $data->update(['file_path' => $request->input('file_path')]);

        //return redirect(route('menuMakanan'))->with('success', 'Data berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cart::where('id_makanan', $id)->delete();
        
        makanan::where('id', $id)->delete();

       

        return redirect('/')->with('success', 'Data berhasil dihapus');
    }
}
