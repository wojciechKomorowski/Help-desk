<h3 class="m-4">Create new:</h3>

<form method="POST" action="/my_tickets" class="form-signin">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="inputTitle" class="sr-only">Title:</label>
        <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Title" required>
    </div>    
    
    <div class="form-group">
        <label for="inputBody" class="sr-only">Body:</label>
        <textarea name="body" type="text" id="inputBody" class="form-control" placeholder="Body..." required></textarea>
    </div>    

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block form-control">Submit</button>
    </div>

    @include ('layouts.errors')
    
</form>