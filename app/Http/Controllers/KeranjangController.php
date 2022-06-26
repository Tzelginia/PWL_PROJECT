<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Transaksi;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Keranjang::with('user')->with('product')->get();
        $keranjang = Keranjang::orderBy('id', 'asc')->paginate(5);
        return view('keranjang', compact('keranjang'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'product_id' => 'required'
        ]);
        $keranjang = new Keranjang();
        $keranjang->jumlah = $request->get('jumlah');
        $keranjang->product_id = $request->get('product_id');
        $keranjang->user_id = $request->user()->id;
        $keranjang->save();
        return redirect("/product")->with('success', 'Product berhsail dimasukkan Keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keranjang::where('id', $id)->delete();
        return redirect('/keranjang')
            ->with('successDel', 'Data Berhasil Dihapus');
    }

    public function transaksi()
    {
        $transaksi = Transaksi::with('user')->with('product')->get();
        $transaksi = Transaksi::orderBy('id', 'desc')->paginate(5);
        return view('transaksi', compact('transaksi'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }
}
