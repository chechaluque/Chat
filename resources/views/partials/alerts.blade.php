@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{ Session::get('success') }}
    </div>
@endif
@if(Session::has('info'))
    <div class="alert alert-info" role="info">
        <strong>{{ Session::get('info') }}</strong>
    </div>
@endif
@if(count($errors) > 0 )

    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
