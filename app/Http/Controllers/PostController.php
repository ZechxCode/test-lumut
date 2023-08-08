<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Post::all();
        return view('home', compact('blog'));
    }

    public function post()
    {
        $posts = Post::all();
        return view('post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.tambah_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $masuk['title'] = $request->title;
        $masuk['content'] = $request->content;
        $masuk['user_id'] = auth()->id();
        // dd($masuk);

        Post::create($masuk);
        return redirect('post')->with('success', 'Data berhasil ditambah');
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
        $editData = Post::where('id', $id)->first();
        return view('post.edit_post', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah['title'] = $request->title;
        $ubah['content'] = $request->content;

        Post::find($id)->update($ubah);
        return redirect('post')->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = Post::where('id', $id)->first();
        Post::destroy($id);

        return redirect('post')->with('success', 'Data berhasil dihapus');
    }
}
