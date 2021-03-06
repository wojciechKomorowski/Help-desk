@extends('layouts.master')

@section('content') 
    <div class="container">

        @include('tickets.partials.logout')

        @include('tickets.partials.welcome') 

        <ul class="list-group">
                <li class="list-group-item list-group-item-info d-flex justify-content-between mb-4 mt-4">
                    <p class="w-25 p-3">
                        <strong>User:</strong>
                    <p>
                    <p class="w-25 p-3">
                        <strong>Title:</strong>
                    <p>
                    <p class="w-25 p-3">
                        Body:
                    </p>
                    <p class="w-25 p-3">
                        Created at:
                    </p>
                    <p class="w-25 p-3">
                        Status:
                    </p>
                </li>

        @foreach ($tickets as $ticket)
            <li class="list-group-item d-flex justify-content-between mt-4">

                @foreach ($users as $user)

                    @if ($ticket->user_id === $user->id)
                        <p class="w-25 p-3">
                            <strong>{{ $user->name }}</strong>
                        <p>
                    @endif 

                @endforeach

                    <p class="w-25 p-3">
                        <strong>{{ $ticket->title }}</strong>
                    <p>
                    <p class="w-25 p-3">
                        {{ $ticket->body }}
                    </p>
                    <p class="w-25 p-3">
                        {{ $ticket->created_at }}
                    </p>

                    <form method="GET" action="tickets/{{ $ticket->id }}" class="w-25 p-3">
                        {{ csrf_field() }}

                        @if ($ticket->status === 'Open')
                        <button type="submit" name="ticket_id" class="btn btn-lg btn-success btn-block form-control">
                            {{ $ticket->status }}
                        </button>
                        @else
                        <button type="submit" name="ticket_id" class="btn btn-lg btn-danger btn-block form-control">
                            {{ $ticket->status }}
                        </button>
                        @endif

                    </form>
                </li> 

                @foreach ($comments as $comment)

                    @if (($comment->ticket_id) === ($ticket->id))
                        <li class="list-group-item comments list-group-item-warning">
                            <p>
                                <strong>Comment:</strong>
                            </p>
                            <p>
                                {{ $comment->comment }}
                            </p>
                            <p>
                                {{ $comment->created_at }}
                            </p>
                        </li>   
                    @endif 
                    
                @endforeach 
            @endforeach
        </ul>    
    </div>       
@endsection