<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            'title' => 'category',
            'category' => Category::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            // 'id' => 'required',
            'nama_category' => 'required'
        ]);
        Category::create($validateData);
        return redirect('/dashboard/category')->with('success', 'Kategori telah ditambahkan');
        // $request->validate([ 'id' => 'required', 
        //                     'nama_category' => 'required'
        //                 ]);
        //                 $category = new Category(); 
        //                 $category->id = $request->get('id'); 
        //                 $category->nama_category = $request->get('nama_category');
        //                 $category->save();
        //                 return redirect('/dashboard/category')
        //                 ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('dashboard.category.edit', compact('category'));
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
        $category = Category::where('id', $id)->first();
        // $category->id = $request->get('id');
        $category->nama_category = $request->get('nama_category');
        $category->save();
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
        Category::where('id', $id)->delete();
        return redirect('/dashboard/category')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $category = Category::where('nama_category', 'like', "%" . $keyword . "%")->paginate(3);
        return view('dashboard.category.index', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
