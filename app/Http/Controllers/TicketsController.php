<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TicketsController extends Controller
{   
    public function userTickets()
    {   
        // Get user and user id
        $userId = auth()->user()->id;
        $user = auth()->user();

        // Create queries
        $tickets = DB::table('tickets')->where('user_id','=', "$userId")->orderBy('created_at', 'desc')->get();

        // Overwrite to change order
        $tickets = DB::table('tickets')->orderBy('status', 'desc')->get();

        $comments = DB::table('comments')->where('user_id', "$userId")->get();

        return view('tickets.user-tickets', compact('user', 'tickets', 'comments'));
    }

    public function store()
    {   
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Get user id
        $userId = auth()->user()->id;

        // Create query
        $ticket = DB::table('tickets')->insert(
            [
                'user_id' => "$userId",
                'title' => request('title'),
                'body' => request('body'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
                'status' => 'Open'    
            ]
        );

        return redirect()->action('TicketsController@userTickets');
    }

    public function index()
    {   
        // Get user
        $user = auth()->user();

        // Create queries
        $tickets = DB::table('tickets')->orderBy('created_at', 'asc')->get();

        // Overwrite to change order
        $tickets =DB::table('tickets')->orderBy('status', 'desc')->get();

        $comments = DB::table('comments')->orderBy('created_at', 'desc')->get();
        
        $users = DB::table('users')->get();

        return view('tickets.index', compact('user','tickets', 'comments', 'users'));
    }

    public function show()
    {   
        // Get ticket id from request
        $ticketId = request('id');

        // Create query
        $ticket = DB::table('tickets')->where('id', "$ticketId")->get();

        $comments = DB::table('comments')->where('ticket_id', "$ticketId")->get();

        return view('tickets.show', compact('ticket', 'comments'));
    }

    public function close()
    {   
        // Get ticket id from request
        $ticketId = request('id');

        // Create query
        $ticket = DB::table('tickets')->where('id', $ticketId)->update(['status' => 'Closed']);

        return redirect()->action('TicketsController@index');
    }

    public function open()
    {   
        // Get ticket id from request
        $ticketId = request('id');

        // Create query
        $ticket = DB::table('tickets')->where('id', $ticketId)->update(['status' => 'Open']);

        return redirect()->action('TicketsController@index');
    }

    public function comment()
    {   
        $this->validate(request(), [
            'comment' => 'required',
        ]);
        
        // Get ticket id needed to proper submit comment
        $ticketId = intval(request('ticket_id'));

        // Get user id needed to proper submit comment
        $userId = DB::table('tickets')->where('id', "$ticketId")->get();

        $userId = $userId->toArray();

        $userId = $userId[0]->id;

        // Create query
        $comment = DB::table('comments')->insert(
            [   
                'user_id' => $userId,
                'ticket_id' => $ticketId,
                'comment' => request('comment'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),   
            ]
        );

        return redirect()->action('TicketsController@index');
    }
}
