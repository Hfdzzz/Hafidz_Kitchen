<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {

        
        $data = cart::where('id', $id)->first();

        

        return view('checkout', compact('data'));
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
        $cart = [
            'user_id' => $request->input('user_id'),
            'id_makanan' => $request->input('id_makanan'),
            'nama_makanan' => $request->input('nama_makanan'),
            'jumlah' => $request->input('jumlahPesanan'),
            'harga' => $request->input('harga'),

        ];

        $data = cart::create($cart);

        return redirect()->route('checkout', ['id' => $data->id]);

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
