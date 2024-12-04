<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        if($request->get('content') && $request->get('tags') && Auth::check() && Auth::user()->id === $post->user_id){
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
        $post = Post::findOrFail($id);
        if(Auth::check() && Auth::user()->id === $post->user_id) {
            return view('posts.edit', compact('post'));
        } else{
            return redirect()->back()
                ->with('message', 'Ce n\'est pas ta revendication !');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatedPost = $request->validate([
            'content' => 'required',
            'tags' => 'required'
        ]);
        Post::whereId($id)->update($updatedPost);
        return redirect()->route('home')
            ->with('message', 'Revendication mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if(Auth::check() && Auth::user()->id === $post->user_id){
            $post->delete();
            return redirect()->back()
                ->with('message', 'Revendication supprimée.');
        } else{
            return redirect()->back()
                ->with('message', 'Revendication non supprimée, casseur de grève !.');
        }
    }
}
