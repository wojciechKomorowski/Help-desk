<h3 class="m-4">Comment:</h3>

<form method="POST" action="{{ $element->id }}/comment" class="form-signin">
    {{ csrf_field() }}   
    
    <div class="form-group">
        <label for="inputComment" class="sr-only"></label>
        <textarea name="comment" type="text" id="inputComment" class="form-control" placeholder="Comment..." required></textarea>
    </div>    

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block form-control">Submit</button>
        <input type="hidden" name="ticket_id" value="{{ $element->id }}">
    </div>

    @include ('layouts.errors')
    
</form>