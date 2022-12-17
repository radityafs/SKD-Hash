<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashController extends Controller
{
    public function hash(Request $request)
    {
        $request->validate([
            'action' => 'required|in:hash,verify_hash',
            'plaintext' => 'required'
        ]);

        $hashed = Hash::make($request->plaintext);

        return view('hash', [
            'action' => 'hash',
            'hashed' => $hashed,
            'plaintext' => $request->plaintext,
            'success' => true
        ])->with('success', 'Hashed successfully');
    }

    public function verify_hash(Request $request)
    {
        $request->validate([
            'plaintext' => 'required',
            'hash' => 'required'
        ]);

        $verified = Hash::check($request->plaintext, $request->hash);

        return view('hash', [
            'action' => 'verify_hash',
            'hash' => $request->hash,
            'plaintext' => $request->plaintext,
            'success' => $verified
        ]);
    }
}
