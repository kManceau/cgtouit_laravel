<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'tags' => 'required'
        ]);
        $request->user()->comments()->create([
            'content' => $request->get('content'),
            'tags' => $request->get('tags'),
            'post_id' => $request->get('post_id'),
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()
            ->with('message', 'Revendication envoyée à la poubelle par Macron.');
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
