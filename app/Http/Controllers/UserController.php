<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::latest()->get();
        return view('pages.users.index', compact('users'));
    }
    
    public function updateRole(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $request->validate([
            'role' => 'required|in:admin,author,user'
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Role user ' . $user->name . ' berhasil diubah!');
    }
}
