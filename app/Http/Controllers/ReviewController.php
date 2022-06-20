<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Review::with('user')->get();
        $review = Review::orderBy('user_id', 'asc')->paginate(5);
        return view('dashboard.review.index', compact('review'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = Review::all();
        return view('contact', ['review' => $review]);
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
            'subject' => 'required',
            'isi' => 'required'
        ]);
        $review = new Review();
        $review->subject = $request->get('subject');
        $review->isi = $request->get('isi');
        $review->user_id = $request->user()->id;
        $review->save();
        return redirect("/review/create")->with('success', 'Review Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::with('user')->where('id', $id)->first();
        return view('dashboard.review.show', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::with('user')->where('id', $id)->first();
        $user = User::all();
        return view('dashboard.review.edit', compact('review', 'user'));
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
            'subject' => 'required',
            'isi' => 'required'
        ]);
        $review = Review::with('user')->where('id', $id)->first();
        $review->subject = $request->get('subject');
        $review->isi = $request->get('isi');
        $review->save();
        return redirect("/review")->with('success', 'Review Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::where('id', $id)->delete();
        return redirect("/review")->with('success', 'Review Berhasil Dihapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $review = Review::where('subject', 'like', "%" . $keyword . "%")->paginate(5);
        return view('dashboard.review.index', compact('review'))->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }
}
