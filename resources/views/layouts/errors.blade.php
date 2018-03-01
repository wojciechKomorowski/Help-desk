@if (count($errors))
    <div class="form-group mt-2">
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif