@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button style="margin-left: 99%" type="button" class="btn-small close text-right" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
