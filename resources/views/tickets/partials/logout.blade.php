<form method="GET" action="/logout" class="form-signin">
    {{ csrf_field() }}

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-secondary btn-block form-control">Log out</button>
    </div>
</form>  