<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->get('content') && $request->get('tags') && Auth::check()){
            $request->validate([
                'content' => 'required',
                'tags' => 'required'
            ]);
            $request->user()->posts()->create([
                'content' => $request->get('content'),
                'tags' => $request->get('tags')
            ]);

            return redirect()->back()
                ->with('message', 'Revendication envoyée à la poubelle par Macron.');
        }
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('posts'));
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
