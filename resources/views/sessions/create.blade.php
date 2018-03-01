@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="/login" class="form-signin">
            {{ csrf_field() }}
            
            <h1>Help-desk</h1>
                    
            <h1 class="h3 mb-3 font-weight-normal">Please Sign in</h1>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

            @include ('layouts.errors')

        </form>
    </div>
@endsection