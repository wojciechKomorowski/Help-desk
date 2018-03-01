<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class SessionsController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() 
    {
        return view('sessions.create');
    }

    public function store() 
    {   
        // Attempt to authenticate the user

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        };

        // Getting email to recognize logged user

        $userEmail = request('email');

        return redirect()->action('TicketsController@index')->with(compact('userEmail'));
    }

    public function destroy() 
    {
        auth()->logout();
        
        return redirect('/');
    }
}
