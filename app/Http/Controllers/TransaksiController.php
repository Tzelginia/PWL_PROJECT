<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::paginate(5);
        return view('dashboard.transaksi.index', compact('transaksi'))->with('i', (request()
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
            'product_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'bukti' => 'nullable|image|file|max:2048'
        ]);
        $transaksi = new Transaksi();
        $transaksi->product_id = $request->get('product_id');
        $transaksi->user_id = $request->user()->id;
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->total = $request->get('total');

        if ($request->file('bukti')) {
            $transaksi->bukti = $request->file('bukti')->store('transaksi-img');
        }

        $transaksi->save();

        Keranjang::where('id', $request->keranjang_id)->delete();

        return redirect('/keranjang')->with('success', 'Terima Kasih telah melakukan transaksi');
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
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi->bukti) {
            Storage::delete($transaksi->bukti);
        }
        $transaksi->delete();
        return redirect('/dashboard/transaksi')->with('success', 'Transaksi telah dihapus');
    }

        public function bayar(Request $request){
        $request->validate([
            'bukti' => 'image|file|max:2048'
        ]);

        // $transaksi = Transaksi::where('id', $request->id)->first();
        $transaksi = Transaksi::where('id', $request->id)->first();
        if($request->file('bukti')){
            $transaksi->bukti = $request->file('bukti')->store('transaksi-img');
        }

        $transaksi->save();

        return redirect('/transaksiUser')->with('success', 'Terima Kasih telah melakukan transaksi');

    }

    public function verify(Request $request)
    {

        $transaksi = Transaksi::where('id', $request->id)->first();
        $transaksi->verify = '1';
        $transaksi->save();

        return redirect('/dashboard/transaksi');
    }
}
