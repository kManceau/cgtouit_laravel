<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'required|max:40',
            'image' => 'nullable|string',
        ]);

        $user->update($request->all());
        return back()
            ->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user){

        if(Auth::user()->id === $user->id) {
            $user->delete();
            return redirect()->route('login')
                ->with('message', 'Le compte a bien été supprimé.');
        } else {
            return redirect()->back()
                ->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }
}
