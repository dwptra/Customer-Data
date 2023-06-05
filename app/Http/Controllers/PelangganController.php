<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()) {
            return redirect('/')->with('fail', 'Login terlebih dahulu');
        }
        $customers = Pelanggan::all();
        return view('pages.pelanggan.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        if (!Auth::user()) {
            return redirect('/')->with('fail', 'Login terlebih dahulu');
        }
        return view('pages.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'customer_name' => 'required|min:2',
            'address' => 'required|min:5'
        ]);

        Pelanggan::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect('/pelanggan')->with('success', 'Data baru tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Auth::user()) {
            return redirect('/')->with('fail', 'Login terlebih dahulu');
        }
        $pelanggan = Pelanggan::find($id);
        return view('pages.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',
            'customer_name' => 'required|min:2',
            'address' => 'required|min:5'
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->customer_name = $request->customer_name;
        $pelanggan->email = $request->email;
        $pelanggan->phone = $request->phone;
        $pelanggan->address = $request->address;
        $pelanggan->save();
        
        return redirect('/pelanggan')->with('success', 'Berhasil memperbaharui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pelanggan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
