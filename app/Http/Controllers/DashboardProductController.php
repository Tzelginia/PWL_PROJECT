<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->get();
        $product = Product::orderBy('category_id', 'asc')->paginate(3);
        return view('dashboard.product.index', compact('product'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.product.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'nama' => 'required|unique:products',
            'harga' => 'required|numeric',
            'file_pendukung' => 'image|file|max:2048'

        ]);

        if ($request->file('file_pendukung')) {
            // $validatedData['file_pendukung'] = $request->file('file_pendukung')->store('product-img');
                // $image = $request->file('file_pendukung')->store('product-img');
                // $filenameWithExt = $request->file('file_pendukung')->getClientOriginalName();
                // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // $extension = $request->file('file_pendukung')->getClientOriginalExtension();
                // $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                // $path = $request->file('file_pendukung')->storeAs('product-img', $filenameSimpan);
                // $savepath = 'product-img/' . $filenameSimpan;

                $googleConfigFile = file_get_contents(config_path('key.json'));
                $storage = new StorageClient([
                        'keyFile' => json_decode($googleConfigFile, true)
                ]);
                $storageBucketName = config('googlecloud.storage_bucket');
                $bucket = $storage->bucket($storageBucketName);

                 //get filename with extension
                $filenamewithextension = pathinfo($request->file('file_pendukung')->getClientOriginalName(), PATHINFO_FILENAME);
                // $filenamewithextension = $request->file('file_pendukung')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('file_pendukung')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                Storage::put('public/product-img/' . $filenametostore, fopen($request->file('file_pendukung'), 'r+'));

                $filepath = storage_path('app/public/product-img/' . $filenametostore);
                $validatedData['file_pendukung'] = 'product-img/' . $filenametostore;
                $object = $bucket->upload(
                    fopen($filepath, 'r'),
                    [
                        'predefinedAcl' => 'publicRead',
                        'name' => $validatedData['file_pendukung']
                    ]
                );

                
                

                // dd($image);
                // $fileSource = fopen(storage_path('app/public/'. $savepath), 'r');
                // $bucket->upload($fileSource, [
                //         'predefinedAcl' => 'publicRead',
                //         'name' => $savepath
                // ]);
                
        }
        
    
        Product::create($validatedData);

        return redirect('/dashboard/product')->with('success', 'Data Produk Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        return view('dashboard.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        $category = Category::all();
        return view('dashboard.product.edit', compact('product', 'category'));
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
            'category_id' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'file_pendukung' => 'image|file|max:2048'
        ]);

        $product = Product::where('id', $id)->first();
        $product->category_id = $request->get('category_id');
        $product->nama = $request->get('nama');
        $product->harga = $request->get('harga');


        if ($request->file('file_pendukung')) {
            if ($request->oldfile_pendukung) {
                // Storage::delete($request->oldfile_pendukung);
                $storage = new StorageClient([
                'keyFilePath' => public_path('key.json')
                ]);

                $bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');
                $bucket = $storage->bucket($bucketName);
                $object = $bucket->object($request->oldfile_pendukung);

                $object->delete();
                    
                }
            $product->file_pendukung = $request->file('file_pendukung')->store('product-img');
            // $validatedData['file_pendukung'] = $request->file('file_pendukung')->store('product-img');
            $googleConfigFile = file_get_contents(config_path('key.json'));
                $storage = new StorageClient([
                        'keyFile' => json_decode($googleConfigFile, true)
                ]);
                $storageBucketName = config('googlecloud.storage_bucket');
                $bucket = $storage->bucket($storageBucketName);

                 //get filename with extension
                $filenamewithextension = pathinfo($request->file('file_pendukung')->getClientOriginalName(), PATHINFO_FILENAME);
                // $filenamewithextension = $request->file('file_pendukung')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('file_pendukung')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                Storage::put('public/product-img/' . $filenametostore, fopen($request->file('file_pendukung'), 'r+'));

                $filepath = storage_path('app/public/product-img/' . $filenametostore);
                $product->file_pendukung = 'product-img/' . $filenametostore;
                $object = $bucket->upload(
                    fopen($filepath, 'r'),
                    [
                        'predefinedAcl' => 'publicRead',
                        'name' => $product->file_pendukung
                    ]
                );

        }

        $product->save();

        return redirect('/dashboard/product')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->file_pendukung) {
            $storage = new StorageClient([
            'keyFilePath' => public_path('key.json')
            ]);

            $bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');
            $bucket = $storage->bucket($bucketName);
            $object = $bucket->object($product->file_pendukung);

            $object->delete();
            }
        $product->delete();
        return redirect('/dashboard/product')->with('success', 'product telah dihapus');
    }
}
