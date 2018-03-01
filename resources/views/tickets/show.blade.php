<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Help-desk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- URL::asset will link to project/public/ folder  --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body class="text-center">
    
    @include('tickets.partials.logout')

    <div class="container">
        <div class="card text-center">

            @foreach ($ticket as $element)
                <div class="card-header">
                    <h4 class="card-title">
                        {{ $element->title }}
                    </h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        {{ $element->body }}
                    </li>
                    <li class="list-group-item list-group-item-light">
                        {{ $element->created_at }}
                    </li>

                    @if (count($comments))
                    <li class="list-group-item comments list-group-item-warning">
                        @foreach ($comments as $comment)
                            {{ $comment->comment }}
                        @endforeach
                    </li>
                    @endif

                </ul>

                @if ($element->status === 'Open')
                <form method="POST" action="{{ $element->id }}/close">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger m-2">
                        Close ticket
                    </button>
                </form>
                @else
                <form method="POST" action="{{ $element->id }}/open">
                    {{ csrf_field() }}
                    
                    <button type="submit" class="btn btn-success m-2">
                        Open ticket
                    </button>
                </form>
                @endif

            @endforeach    
        </div>

        @include('tickets.partials.create-comment')
        
    </div>

</body>
</html>
