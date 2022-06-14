<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'title' => 'Dashboard',
            'product' => DB::table('products')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('dashboard.product.create',[
                'title' => 'Tambah Product',
                'category' => DB::table('categories')->get()
            ]);
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $gambars = $request->file->getClientOriginalName() . '-' . time() . '.' . $request->file->extension();
        $request->file->move(public_path('img/'), $gambars);
        DB::table('products')->insert([
            "category_id" =>  $request->category_id,
            "nama" =>  $request->nama,
            "harga" =>  $request->harga,
            "file_pendukung" =>  $gambars,
        ]);
        return redirect('/dashboard/product')->with(['success' => 'Data Produk Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array('title' => 'Foto Produk');
        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array('title' => 'Form Edit Produk');
        return view('produk.edit', $data);
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
        $request->validate([
            // 'id' => 'required',
            'nama_category' => 'required',
        ]);
        $product = Product::where('id', $id)->first();
        // $category->id = $request->get('id');
        $product->nama_category = $request->get('nama_category');
        $product->save();
        return redirect('/dashboard/category')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            Product::where('id', $id)->delete();
            return redirect('/dashboard/category')
                ->with('success', 'Data Berhasil Dihapus');
        }
}