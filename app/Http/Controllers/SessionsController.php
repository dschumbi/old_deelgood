<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        dump(session('offer'));
        return view('auth.login');
    }

    public function store()
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back();
        }
    }

    public function destroy()
    {
        //session destroy
        auth()->logout();
        return redirect('/');
    }
}